<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->double('tetherAmount');
            $table->unsignedBigInteger('tomanAmount');
            $table->double('tetherBuyPrice');
            $table->string('tether_type');
            $table->string('walletAddress');
            $table->string('transaction_id')->nullable();
            $table->string('payment_status')->default('unknown');
            $table->string('buy_status')->default('unpaid');
            $table->string('txid')->nullable();
            $table->timestamps();

            $table->foreign('user_id' , 'buy_requests_user_id_foreign_auth')->references('user_id')->on('authentications')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_requests');
    }
}
