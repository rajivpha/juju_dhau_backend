<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('product_name',50);
            $table->string('quantity_size',50);
            $table->string('category_id',30);
            $table->string('price',10);
            $table->string('image',255)->nullable();
            $table->dateTime('mfd_date',6);
            $table->dateTime('expiry_date',6)->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('admin_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
