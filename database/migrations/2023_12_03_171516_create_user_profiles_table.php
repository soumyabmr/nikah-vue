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
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('ethnicity');
            $table->unsignedBigInteger('country');
            $table->string('nationality');
            $table->enum('gender',['Male', 'Female']);
            $table->enum('body_type',['Slim', 'Athletic','Average','Heavy']);
            $table->enum('complexion',['Very Fair', 'Fair','Wheatish','Wheatish Brown','Dark']);
            $table->date('date_of_birth');
            $table->string('phone');
            $table->enum('status', ['New','Draft','Pending','Approved','Rejected'])->default('New');
            $table->enum('marital_status', ['Never Married', 'Married', 'Divorced', 'Widowed', 'Awaiting Divorce'])->default('Never Married');
            $table->smallInteger('height'); // centimeters
            $table->smallInteger('weight'); // kg
            $table->string('education');
            $table->string('profession');
            $table->text('summary');
            $table->text('expectation');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country')->references('id')->on('countries');
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
        Schema::dropIfExists('profiles');
    }
};
