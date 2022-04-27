<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Enum\UserRoleEnum;
  
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE TRIGGER `CREATE_CUSTOMER_AFTER_USER_INSERT` AFTER INSERT ON `users`
                FOR EACH ROW BEGIN
                    IF (NEW.role_id = (SELECT id FROM roles WHERE name = '" . UserRoleEnum::CUSTOMER->value . "')) THEN
                        INSERT INTO customers (user_id) VALUES (NEW.id);
                    END IF;
                END"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TRIGGER `CREATE_CUSTOMER_AFTER_USER_INSERT`');
    }
};
