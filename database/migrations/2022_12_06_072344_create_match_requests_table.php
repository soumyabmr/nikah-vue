<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * id
    sender
    receiver
    request_date
    response_date (nullable)
    success (bool)

     */
    public function up()
    {
        Schema::create('match_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender');
            $table->unsignedBigInteger('receiver');
            $table->dateTime('request_date');
            $table->dateTime('response_date');
            $table->enum('status', ['Accepted','Rejected','Pending','Cancelled'])->default('Pending');
            $table->foreign('sender')->references('id')->on('users');
            $table->foreign('receiver')->references('id')->on('users');
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
        Schema::dropIfExists('match_requests');
    }
};
