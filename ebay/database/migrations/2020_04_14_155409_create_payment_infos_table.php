<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
            $table->string('cardType')->nullable();
            $table->string('cardNumber')->nullable();
            $table->string('cardName')->nullable();
            $table->string('expirationDate')->nullable();
            $table->string('securityCode')->nullable();
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_infos');
    }
}
