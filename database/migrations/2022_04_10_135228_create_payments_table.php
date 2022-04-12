<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('payment_datetime');
            $table->foreignId('order_id')->constrained();
            // $table->foreign('order_id')->references('id')->on('orders');
            $table->foreignId('customer_id')->constrained();
            // $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreignId('payment_type_id')->constrained();
            // $table->foreign('payment_type_id')->references('id')->on('payment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
