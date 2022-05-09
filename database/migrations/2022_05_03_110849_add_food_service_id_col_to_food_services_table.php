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
        Schema::table('food_services', function (Blueprint $table) {
            $table->foreignId('food_service_type_id')
                   ->references('id')
                   ->on('food_service_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_services', function (Blueprint $table) {
            $table->dropColumn('food_service_type_id');
        });
    }
};
