<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sess_token')->unique();
            $table->string('video_link')->nullable();

            $table->boolean('session_type')->default(false);
            $table->Integer('jalase_type')->nullable();
            $table->bigInteger('u_id')->unsigned()->index()->nullable();
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('total_number')->default(1);
            $table->boolean('is_started')->nullable();
            $table->boolean('is_ended')->nullable();
            $table->string('end_at')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            
            $table->timestamps();
            // $table->foreignId('u_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
