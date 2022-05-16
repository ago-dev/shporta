<?php

namespace App\Http\Controllers;


use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Requests\FoodServiceUpdateRequest;
use App\Http\Requests\StoreFoodServiceRequest;
use App\Models\Employee;
use App\Models\FoodCategory;
use App\Models\FoodItem;
use App\Models\FoodService;
use App\Models\FoodServiceType;
use App\Models\Menu;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $foodService = FoodService::where('id', $id)->first();
        $menu = Menu::where('food_service_id', $foodService->id)->first();
        $foodCategories = FoodCategory::all();
        return view('pages.customer.menus.menu',
            compact('foodService', 'menu', 'foodCategories'));
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
        return redirect()->back()->with('message', 'Successfully updated Food Service!');
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
