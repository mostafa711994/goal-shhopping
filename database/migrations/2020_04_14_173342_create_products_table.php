<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->unique()->nullable(false);
            $table->unsignedInteger('selling_price')->nullable(false);
            $table->unsignedInteger('buying_price')->nullable(false);
            $table->unsignedInteger('discount')->nullable(false);
            $table->string('description',100)->nullable(false);
            $table->text('details')->nullable(false);
            $table->enum('is_available',['Sold Out','In Stock'])->default('Sold Out');
            $table->enum('trend',['is trend','not trend'])->default('not trend');
            $table->enum('best_seller',['best seller','not best seller'])->default('not best seller');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('image_id')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

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
        Schema::dropIfExists('products');
    }
}
