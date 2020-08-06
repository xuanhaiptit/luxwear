<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name')->unique();
            $table->string('alias');
            $table->integer('price_new');
            $table->integer('price_old')->nullable();
            $table->text('product_desc')->nullable();
            $table->text('product_content')->nullable();
            $table->string('image');
            $table->integer('qty_product');
            $table->string('keyword')->nullable();
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade');
            $table->integer('cate_product_detail_id')->unsigned();
            $table->foreign('cate_product_detail_id')->references('id')->on('cate_product_detail')->onDelete('cascade');
            $table->enum('selling_product', ['Bình thường', 'Bán chạy']);
            $table->enum('featured_product', ['Bình thường', 'Nổi bật']);
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
        Schema::dropIfExists('product');
    }
}
