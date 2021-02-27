<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table  -> id();

            $table -> string('name');
            $table -> string('email') -> unique();
            $table -> timestamp('email_verified_at') -> nullable();
            $table -> string('password');
            $table -> rememberToken();

            
            $table -> string('address', 100);
            $table -> string('city', 100);
            $table -> string('IVA', 100) -> unique(); 
            $table -> string('day_off', 50);
            $table -> text('logo');
            
            
            $table -> tinyInteger('rating') -> unsigned() -> default(0);
            
            $table  -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
