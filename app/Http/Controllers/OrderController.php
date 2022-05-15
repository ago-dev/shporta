<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\ItemOrder;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStoreRequest $request
     * @return Response
     */
    public function store(OrderStoreRequest $request)
    {
        $customer = Customer::where('user_id', auth()->user()->id)->first();
        //prepare data for insert
        $data = [
            'orderDatetime' => Carbon::now(),
            'deliveryDatetime' =>Carbon::now()->addMinutes(30),
            'address' => $request['address'],
            'orderPoints' => round(\Cart::getTotal()),
            'customerId' => $customer->id
        ];

        //customer add order points
        $customer->customer_points = $customer->customer_points + $data['orderPoints'];
        $customer->save();

        // Store order
        $order = Order::store($data);

        //Store order items
        foreach (\Cart::getContent() as $orderItem) {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
