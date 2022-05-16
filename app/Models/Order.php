<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_datetime', 'address', 'customer_id', 'order_points', 'delivery_datetime'];
    public $timestamps = false;

    protected static $PENDING = 'PENDING';
    protected static $DELIVERED = 'DELIVERED';
    protected static $REJECTED = 'REJECTED';

    public static function store($data): Order {
        return Order::create([
            'order_datetime' => $data['orderDatetime'],
            'delivery_datetime' => $data['deliveryDatetime'],
            'address' => $data['address'],
            'order_points' => $data['orderPoints'],
            'customer_id' => $data['customerId']
        ]);
    }

    public static function list(): LengthAwarePaginator
    {
        return order::paginate(5);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function items()
    {
        return $this->belongsToMany(FoodItem::class, 'item_orders')
                    ->withPivot(['quantity', 'item_rating']);
    }

    public function totalPrice()
    {
        if (empty($this->items)) return 0;

        $totalPrice = 0;
        foreach($this->items as $item)
            $totalPrice += $item->pivot->quantity * $item->price;

        return '$' . $totalPrice;
    }

    public function setDelivered()
    {
        $this->delivery_datetime = Carbon::now();
        $this->id_status = OrderStatus::getByName(Order::$DELIVERED);
        return $this;
    }

    public static function edit(Request $request)
    {
        $order = Order::find($request['id']);
        // $order->delivery_datetime = $request['deliveryDatetime'];
        if (isset($request['delivered']))
            $order->status_id = OrderStatus::getByName(Order::$DELIVERED)->id;
        if (isset($request['rejected']))
            $order->status_id = OrderStatus::getByName(Order::$REJECTED)->id;
        $order->save();
    }
}
