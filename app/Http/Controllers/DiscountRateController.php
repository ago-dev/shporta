<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscountRateRequest;
use App\Http\Requests\UpdateDiscountRateRequest;
use App\Models\DiscountRate;

class DiscountRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscountRateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscountRateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiscountRate  $discountRate
     * @return \Illuminate\Http\Response
     */
    public function show(DiscountRate $discountRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscountRateRequest  $request
     * @param  \App\Models\DiscountRate  $discountRate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscountRateRequest $request, DiscountRate $discountRate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiscountRate  $discountRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountRate $discountRate)
    {
        //
    }
}
