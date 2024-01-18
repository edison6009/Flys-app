<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->id();
            $table->string('airport_name');
            $table->unsignedBigInteger('country_id');
            $table->string('number_landing_strips');
            $table->string('number_terminals');
            $table->string('number_boarding_gates');
            $table->string('number_public_toilets');
            $table->string('number_shops');
            $table->string('number_restaurants');
            $table->string('maximum_people');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructures');
    }
};
