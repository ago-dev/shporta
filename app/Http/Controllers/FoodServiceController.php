<?php

namespace App\Http\Controllers;


use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Requests\FoodServiceUpdateRequest;
use App\Http\Requests\StoreFoodServiceRequest;
use App\Models\Employee;
use App\Models\FoodService;
use App\Models\FoodServiceType;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FoodServiceController extends Controller
{
    public function index()
    {
        $foodServiceTypes = FoodServiceType::all();
        $foodServices = FoodService::list();
        return view('pages.dashboard.food-services.food-services',
            compact(['foodServices', 'foodServices'], ['foodServiceTypes', 'foodServiceTypes']));
    }

    public function store(StoreFoodServiceRequest $request)
    {
        FoodService::store($request);
        return redirect()->back()->with('message', 'Successfully added Food Service!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FoodServiceUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(FoodServiceUpdateRequest $request)
    {
        FoodService::edit($request);
        return redirect()->back()->with('message', 'Successfully updated employee account!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Menu::deleteByFoodServiceId($request['id']);
        FoodService::destroy($request['id']);
        return redirect()->back()->with('message', 'Successfully removed Food Service!');
    }
}
