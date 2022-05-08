<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesscontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesscont', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('s_id')->unsigned()->index()->nullable();
            $table->foreign('s_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->bigInteger('c_id')->unsigned()->index()->nullable();
            $table->foreign('c_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->boolean('sms_status')->default(0);
            $table->string('token')->unique();
            $table->boolean('ostad_flag')->nullable()->default(0);
            $table->timestamps();
            // $table->bigInteger('u_id')->unsigned()->index()->nullable();
            // $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreignId('c_id')->constrained('contacts');
            // $table->foreignId('s_id')->constrained('sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesscont');
    }
}
