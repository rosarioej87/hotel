<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_order', function (Blueprint $table) {
            $table->integer('food_id')->unsigned()->index();
            $table->integer('booking_id')->unsigned()->index();
            $table->integer('quantity')->default(1);
            $table->decimal('cost', 8, 2);

            $table->timestamps();

            $table->foreign('food_id')
                ->references('id')->on('foods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('booking_id')
                ->references('id')->on('bookings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_order');
    }
}
