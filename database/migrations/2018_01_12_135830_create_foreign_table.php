<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products',function (Blueprint $table){
            $table->integer('typeId')->unsigned();
            $table->foreign('typeId')->references('id')->on('types')->onDelete('cascade');
        });

        Schema::table('carts',function (Blueprint $table){
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->integer('productId')->unsigned();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });
        Schema::table('transactions',function (Blueprint $table){
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->integer('productId')->unsigned();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
