<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteMenuRequest;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\FoodService;
use App\Models\Menu;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $foodServices = FoodService::all();
        $menus = Menu::paginate(5);
        return view('pages.dashboard.menus.menus', compact('foodServices', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  StoreMenuRequest  $request
     */
    public function store(StoreMenuRequest $request)
    {
        $menu = Menu::store($request);
        (new ImportController)->importMenu($request, $menu->id);
        return redirect()->back()->with('message', 'Successfully uploaded menu!');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $menu = Menu::where('id', $id);
        return view('pages.customer.menus.menu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param Menu $menu
     * @return Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteMenuRequest $request
     * @return RedirectResponse
     */
    public function destroy(DeleteMenuRequest $request)
    {
        Menu::deleteById($request);
        return redirect()->back()->with('message', 'Successfully removed menu!');
    }
}
