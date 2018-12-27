<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('user_email');
            $table->integer('product_id');
            $table->integer('staff_id');
            $table->integer('price');
            $table->string('convection');
            $table->string('cover');
            $table->text("address");
            $table->string('title');
            $table->enum('status', ['SUBMIT', 'PROCESS', 'FINISH','CANCEL']);
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
        Schema::dropIfExists('pesans');
    }
}
