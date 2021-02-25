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
    public function up()
    {   
        //user-dishes
        Schema::table('dishes', function (Blueprint $table) {
            $table -> foreign('user_id', 'dish-user')
                   -> references('id')
                   -> on('users');
        });

        //category-dishes
        Schema::table('dishes', function (Blueprint $table) {
            $table -> foreign('category_id', 'category-dish')
                   -> references('id')
                   -> on('categories');
        });

        //user-payments
        Schema::table('payments', function (Blueprint $table) {
            $table -> foreign('user_id', 'payment-user')
                   -> references('id')
                   -> on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down()
    {
        //user-dishes
        Schema::table('dishes', function (Blueprint $table) {

			$table -> dropForeign('dish-user');
	    });

        
        //category-dishes
        Schema::table('dishes', function (Blueprint $table) {
            
			$table -> dropForeign('category-dish');
	    });

        //user-payment
        Schema::table('payments', function (Blueprint $table) {
            
			$table -> dropForeign('payment-user');
	    });
        

    }
}
