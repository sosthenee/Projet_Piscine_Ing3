<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->bigInteger("delivery_adress_id");
            $table->foreign('delivery_adress_id')->references('id')->on('delivery_adress')->onDelete('CASCADE');
            
            $table->integer("offer_id");
            $table->foreign('offer_id')->references('id')->on('offer')->onDelete('CASCADE');
            
            $table->date('paiement_date')->nullable();
            $table->date('delivery_date')->nullable();
            
            $table->integer('transaction')->nullable();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
