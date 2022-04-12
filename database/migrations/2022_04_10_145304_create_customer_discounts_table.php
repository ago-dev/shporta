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
        Schema::create('customer_discounts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('end_date');
            $table->foreignId('customer_id')->constrained();
            // $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreignId('discount_rate_id')->constrained();
            // $table->foreign('discount_rate_id')->references('id')->on('discount_rates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_discounts');
    }
};
