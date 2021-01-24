<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id');

            $table->string('product_name');
            $table->string('slug');
            $table->string('content');

            $table->integer('status');

            $table->string('keywords');
            $table->string('description');

            $table->integer('size')->nullable()->unsigned();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();

            $table->float('price')->unsigned();
            $table->integer('sale_id')->nullable()->unsigned();

            $table->string('image')->nullable();

            $table->integer('hit');

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
        Schema::dropIfExists('shop_products');
    }
}
