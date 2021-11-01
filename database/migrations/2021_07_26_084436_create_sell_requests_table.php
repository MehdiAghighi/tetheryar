<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('mail');
            $table->string('shaba')->nullable();
            $table->string('cart')->nullable();
            $table->string('bank');
            $table->string('tether_type')->nullable();
            $table->string('tetherSellPrice');
            $table->unsignedDouble('tetherAmountSend');
            $table->unsignedDouble('tetherAmountReceived')->default(0);
            $table->unsignedBigInteger('tomanAmount');
            $table->string('txid')->nullable();
            $table->string('tetherStatus')->default('unpaid');
            $table->string('tomanStatus')->default('unpaid');
            $table->integer('trackingCode')->unique();
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
        Schema::dropIfExists('sell_requests');
    }
}
