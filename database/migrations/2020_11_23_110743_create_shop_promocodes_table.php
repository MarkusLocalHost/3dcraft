<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_promocodes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('description');

            $table->integer('percent')->nullable()->unsigned();
            $table->integer('amount')->nullable()->unsigned();

            $table->integer('status');

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
        Schema::dropIfExists('shop_promocodes');
    }
}
