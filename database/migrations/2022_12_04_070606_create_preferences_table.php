<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *id
    user_id
    min_age
    max_age
    min_height
    max_height
    min_weight
    max_weight
    nationalities(1,2,3) # breakout on one-to-many
    languages(1,2,3) # breakout on one-to-many
    residence_locations(1,2,3) # breakout on one-to-many
    job
    expectations(text: small summary)

     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->smallInteger('min_age');
            $table->smallInteger('max_age');
            $table->smallInteger('min_height');
            $table->smallInteger('max_height');
            $table->smallInteger('min_weight');
            $table->smallInteger('max_weight');
            $table->string('nationalities');
            $table->string('languages');
            $table->string('residence_locations');
            $table->string('marital_status');
            $table->string('complexion');
            $table->string('body_type');
            $table->text('expectations');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('preferences');
    }
};
