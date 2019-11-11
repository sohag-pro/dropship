<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->tinyInteger('status')->nullable($value = true)->comment = '0 New Quote, 1 Quote given, 2 Payment Done, 3 Shobgulo Added, 4 Order Placed, 5 Partially Arrived, 6 Full Arrived, 7 Delivered, 8 Cancelled, 9 Refunded';
            $table->text('shipping_charge')->nullable($value = true);
            $table->integer('exchange_rate')->nullable($value = true);
            $table->integer('price_gbp')->nullable($value = true);
            $table->integer('price_bdt')->nullable($value = true);
            $table->integer('tax_bdt')->nullable($value = true);
            $table->integer('shipping_bdt')->nullable($value = true);
            $table->integer('paid_bdt')->nullable($value = true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_user_id_foreign');
        });
        Schema::dropIfExists('orders');
    }
}
