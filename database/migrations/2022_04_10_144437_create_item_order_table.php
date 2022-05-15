<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {/*         Schema::create('item_order', function (Blueprint $table) {
            $table->integer('quantity')->default(1);
            $table->integer('item_rating')->nullable();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('food_item_id')->constrained();
            $table->primary('order_id', 'food_item_id');
        }); */
        DB::statement("CREATE TABLE item_order(
            quantity int(11) NOT NULL DEFAULT 1,
            item_rating int(11) DEFAULT NULL,
            order_id bigint(20) unsigned NOT NULL,
            food_item_id bigint(20) unsigned NOT NULL,
            PRIMARY KEY (order_id, food_item_id),
            FOREIGN KEY (food_item_id) REFERENCES food_items (id),
            FOREIGN KEY (order_id) REFERENCES orders (id))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_order');
    }
};
