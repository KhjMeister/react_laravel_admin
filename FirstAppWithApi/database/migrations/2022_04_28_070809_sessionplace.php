<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sessionplace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_place', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('s_id')->unsigned()->index()->nullable();
            $table->foreign('s_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->string('place')->nullable();
            $table->bigInteger('tedad')->nullable();
            $table->string('emkanat')->nullable();
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
        Schema::dropIfExists('session_place');
    }
}
