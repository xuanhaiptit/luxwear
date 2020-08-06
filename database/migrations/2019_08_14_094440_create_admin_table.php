<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('password',60);
            $table->char('phone',10);
            $table->string('address');
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->enum('gender', ['Nam', 'Nữ']);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('level')->default(2);
            $table->rememberToken();
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
        Schema::dropIfExists('admin');
    }
}
