<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->bigInteger("item_id");
            $table->foreign('item_id')->references('id')->on('item')->onDelete('CASCADE');
            
            $table->bigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
            
            $table->integer('price');
            $table->string('state');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
