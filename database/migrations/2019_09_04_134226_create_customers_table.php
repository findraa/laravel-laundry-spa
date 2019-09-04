<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 25)->unique();
            $table->string('name', 50);
            $table->string('address', 100);
            $table->string('phone', 15);
            $table->unsignedInteger('courier_id');
            $table->integer('point', 6);
            $table->integer('deposit', 6);
            $table->timestamps();

            $table->foreign('courier_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
