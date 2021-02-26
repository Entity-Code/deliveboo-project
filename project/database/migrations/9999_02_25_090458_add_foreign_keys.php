<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //1 2 3
    {   
        //user-dishes (1..n)
        Schema::table('dishes', function (Blueprint $table) {
            $table -> foreign('user_id', 'dish-user')
                   -> references('id')
                   -> on('users');
        });

        //category-dishes (1..n)
        Schema::table('dishes', function (Blueprint $table) {
            $table -> foreign('category_id', 'category-dish')
                   -> references('id')
                   -> on('categories');
        });

        //user-payments (1..n)
        Schema::table('payments', function (Blueprint $table) {
            $table -> foreign('user_id', 'payment-user')
                   -> references('id')
                   -> on('users');
        });

        //typology-users (n..n)
        Schema::table('typology_user', function (Blueprint $table) {
            $table -> foreign('typology_id', 'tu-typology')
                   -> references('id')
                   -> on('typologies');

            $table -> foreign('user_id', 'tu-user')
                   -> references('id')
                   -> on('users');
        });

        //cart-dish (n..n)
        Schema::table('cart_dish', function (Blueprint $table) {
            $table -> foreign('cart_id', 'cd-cart')
                   -> references('id')
                   -> on('carts');

            $table -> foreign('dish_id', 'cd-dish')
                   -> references('id')
                   -> on('dishes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down() //3 2 1 (delle table all'interno degli schema)
    { 

        //cart-dish (n..n)
        Schema::table('cart_dish', function (Blueprint $table) {
            
            $table -> dropForeign('cd-dish'); 
            $table -> dropForeign('cd-cart'); 
        });

        //typology-users (n..n)
        Schema::table('typology_user', function (Blueprint $table) {
            
            $table -> dropForeign('tu-user'); 
            $table -> dropForeign('tu-typology'); 
        });

        //user-dishes (1..n)
        Schema::table('dishes', function (Blueprint $table) {

			$table -> dropForeign('dish-user');
	    });

        
        //category-dishes (1..n)
        Schema::table('dishes', function (Blueprint $table) {
            
			$table -> dropForeign('category-dish');
	    });

        //user-payment (1..n)
        Schema::table('payments', function (Blueprint $table) {
            
			$table -> dropForeign('payment-user');
	    });
        
    }
}
