<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOrderShopProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_shop_product', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('shop_order_id')->unsigned();
            $table->integer('shop_product_id')->unsigned();
            $table->integer('sale_id')->unsigned()->nullable();

            $table->integer('qty')->unsigned();
            $table->float('price')->unsigned();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_order_shop_product');
    }
}
