<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentPaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_paids', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('paid_date',6);
            $table->string('cheque_no',50)->nullable();
            $table->string('paid_amount',30);
            $table->string('supplier',50);
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
        Schema::dropIfExists('payment_paids');
    }
}
