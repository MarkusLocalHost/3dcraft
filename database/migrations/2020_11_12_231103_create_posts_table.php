<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('description');
            $table->text('content');

            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('views')->unsigned()->default(0);
            $table->string('thumbnail')->nullable();

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('blog_categories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('is_published');
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
