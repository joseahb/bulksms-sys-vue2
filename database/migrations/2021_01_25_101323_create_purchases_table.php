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
            $table->bigIncrements('id');
            $table->float('amount');
            $table->dateTime('datetime')->useCurrent();
            $table->unsignedBigInteger('wallet_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            //foreign keys
            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->foreign('service_id')->references('id')->on('services');
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
