<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',50);
            $table->string('quantity_size',50);
            $table->string('price',10);
            $table->string('image',255)->nullable();
            $table->dateTime('delivered_date',6);
            $table->string('supplier_id',50);
            $table->string('invoice_no',50);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('supplies');
    }
}
