<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerDiscountRequest;
use App\Http\Requests\UpdateCustomerDiscountRequest;
use App\Models\CustomerDiscount;

class CustomerDiscountController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomerDiscountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerDiscountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerDiscount  $customerDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerDiscount $customerDiscount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerDiscountRequest  $request
     * @param  \App\Models\CustomerDiscount  $customerDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerDiscountRequest $request, CustomerDiscount $customerDiscount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerDiscount  $customerDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerDiscount $customerDiscount)
    {
        //
    }
}
