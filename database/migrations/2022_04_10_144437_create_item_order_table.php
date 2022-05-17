<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement("CREATE TABLE item_orders(
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
        Schema::dropIfExists('item_orders');
    }
};
