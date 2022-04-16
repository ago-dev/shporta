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
<<<<<<<< HEAD:database/migrations/2022_04_09_144221_create_employee_types_table.php
        Schema::create('employee_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
========
        DB::statement('
            INSERT INTO roles (name) VALUES ("Employee"), ("Customer");
        ');
>>>>>>>> develop:database/migrations/2022_04_09_insert_roles.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2022_04_09_144221_create_employee_types_table.php
        Schema::dropIfExists('employee_types');
========
        DB::statement('
            DELETE FROM roles WHERE name = "Employee" OR name = "Customer";
        ');
>>>>>>>> develop:database/migrations/2022_04_09_insert_roles.php
    }
};
