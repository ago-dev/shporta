<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Customer;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Enum\OrderStatusEnum;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Order::list();
        return view('pages.dashboard.orders.orders', compact(['orders', 'orders']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStoreRequest $request
     * @return RedirectResponse
     */
    public function store(OrderStoreRequest $request)
    {
        try {
            $customer = Customer::where('user_id', auth()->user()->id)->first();
            //prepare data for insert
            $data = [
                'orderDatetime' => Carbon::now(),
                'deliveryDatetime' => null,
                'address' => $request['address'],
                'orderPoints' => round(\Cart::getTotal()),
                'statusId' => OrderStatus::getIdByEnum(OrderStatusEnum::PENDING),
                'customerId' => $customer->id
            ];

            //customer add order points
            $customer->customer_points = $customer->customer_points + $data['orderPoints'];
            $customer->save();

            // Store order
            $order = Order::store($data);

            //Store order items
            foreach (\Cart::getContent() as $orderItem) {
                $data = [
                    'quantity' => $orderItem['quantity'],
                    'orderId' => $order->id,
                    'foodItemId' => $orderItem['id']
                ];

                ItemOrder::store($data);
            }

            DB::commit();
            \Cart::clear();
            return redirect()->back()->with('message', 'Order sent!');
        } catch(\Exception $exp) {
            return redirect()->back()->with('message', 'Something didn\'t go as intended, please check your form!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Order::edit($request);
        return redirect()->back()->with('message', 'Successfully updated order!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Order $order
     * @return RedirectResponse
     * @return Response
     */
    public function destroy(Request $request)
    {
        //bad practice - should be done in db schema via cascade, temporary
        ItemOrder::deleteByOrderId($request['id']);
        Order::destroy($request['id']);
        return redirect()->back()->with('message', 'Successfully removed order!');
    }
}
