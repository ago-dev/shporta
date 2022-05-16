<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->delete();
        DB::table('orders')->delete();

        OrderStatus::create(array('name' => 'PENDING'));
        OrderStatus::create(array('name' => 'DELIVERED'));
        OrderStatus::create(array('name' => 'REJECTED'));
    }
}
