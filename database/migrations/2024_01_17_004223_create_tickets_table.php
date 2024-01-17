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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('plane_id');
            $table->date('travel_date');
            $table->string('flight_number');
            $table->string('door_number');
            $table->time('hour')->nullable;
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('plane_id')->references('id')->on('planes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
