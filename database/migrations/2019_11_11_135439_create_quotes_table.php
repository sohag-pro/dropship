<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->text('link');
            $table->integer('qty');
            $table->text('description')->nullable($value = true);
            $table->integer('price_gbp')->nullable($value = true);
            $table->integer('postage_gbp')->nullable($value = true);
            $table->integer('tax_bdt')->nullable($value = true);
            $table->integer('price_bdt')->nullable($value = true);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropForeign('quotes_order_id_foreign');
        });
        Schema::dropIfExists('quote');
    }
}
