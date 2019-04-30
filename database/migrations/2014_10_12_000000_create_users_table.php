<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->unique();
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->string('last_name',50);
            $table->string('address',255);
            $table->string('contact_no',50)->unique();
            $table->string('email',50)->unique();
            $table->string('image',255)->nullable();
            $table->string('password');
            $table->string('admin_id')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
