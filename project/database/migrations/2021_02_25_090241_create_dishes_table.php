<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table -> id();

            $table -> string('name', 50);
            $table -> tinyInteger('status');
            $table -> integer('price');
            $table -> text('description');
            $table -> text('img_dish'); 

            //foreign keys
            /*
            $table -> bigInteger('id_category') -> unsigned(); 
            $table -> bigInteger('id_restaurant') -> unsigned(); 
            $table -> bigInteger('id_cart') -> unsigned(); 
            */
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes'); 
    }
}
