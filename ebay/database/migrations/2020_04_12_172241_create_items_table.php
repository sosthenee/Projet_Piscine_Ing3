<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements("id"); //par defaut une clé primaire

            $table->bigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
            
            $table->string('Title');
            $table->string('Description')->nullable();
            $table->integer('Initial_Price')->unsigned()->nullable();
            $table->string('Category')->nullable();
            $table->string('sell_type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('sold')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
