<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('ca_id')->unsigned()->index()->nullable();
            $table->foreign('ca_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('u_id')->unsigned()->index()->nullable();
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('username')->unique();
            

            $table->string('phone');
            $table->string('semat');
            $table->boolean('status')->nullable()->default(0);
           
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
        Schema::dropIfExists('contacts');
    }
}
