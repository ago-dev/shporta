<?php

namespace App\Http\Controllers;


use App\Models\FoodService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the customer welcome view.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $foodServices = FoodService::all();
        return view('pages.customer.welcome', compact('foodServices'));
    }
}
