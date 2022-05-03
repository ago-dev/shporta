<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreFoodServiceRequest;
use App\Models\FoodService;
use App\Models\FoodServiceType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FoodServiceController extends Controller
{
    public function index()
    {
        $foodServiceTypes = FoodServiceType::all();
        $foodServices = FoodService::list();
        return view('pages.food-services.food-services',
            compact(['foodServices', 'foodServices'], ['foodServiceTypes', 'foodServiceTypes']));
    }

    public function store(StoreFoodServiceRequest $request)
    {
        FoodService::store($request);
        return redirect()->back()->with('message', 'Successfully added Food Service!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        FoodService::destroy($request['id']);
        return redirect()->back()->with('message', 'Successfully removed Food Service!');
    }
}
