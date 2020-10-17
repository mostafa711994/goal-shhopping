<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('first_name',50)->nullable(false);
            $table->string('last_name',50)->nullable(false);
            $table->string('username',50)->unique()->nullable(false);
            $table->string('email',125)->unique()->nullable(false);
            $table->enum('role',['user','admin'])->default('user');
            $table->string('password',100)->nullable(false);
            $table->string('api_token',60);
            $table->text('address')->nullable(true);
            $table->string('phone_number',25)->nullable(true);
            $table->unsignedInteger('image_id')->nullable(true);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('image_id')->references('id')
                ->on('images')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

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
