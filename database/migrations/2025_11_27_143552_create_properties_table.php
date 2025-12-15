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
        Schema::create('properties', function (Blueprint $table) {
            $table->string('property_id')->primary();
            $table->string('photo');
            $table->string('owner_name');
            $table->decimal('price', 15);
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->decimal('bed_room');
            $table->decimal('bath_room');
            $table->string('summary')->nullable();
            $table->decimal('area_l');
            $table->decimal('area_w');
            $table->string('review');
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
