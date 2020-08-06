<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('password',60);
            $table->char('phone',10);
            $table->string('address');
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->enum('gender', ['Nam', 'Nữ']);
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('active')->default(0);
            $table->string('token')->nullable()->index();
            $table->timestamps('time_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
