<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_receiveds', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('received_date',6);
            $table->string('receipt_no',50)->unique();
            $table->string('received_amount',30);
            $table->string('user_id',50);
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
        Schema::dropIfExists('payment_receiveds');
    }
}
