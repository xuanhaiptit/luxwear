<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_name')->unique();
            $table->string('alias');
            $table->string('image');
            $table->text('desc')->nullable();
            $table->longText('content')->nullable();
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade');
            $table->integer('cate_post_id')->unsigned();
            $table->foreign('cate_post_id')->references('id')->on('cate_post')->onDelete('cascade');
            $table->enum('featured_post', ['Bình thường', 'Nổi bật']);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
