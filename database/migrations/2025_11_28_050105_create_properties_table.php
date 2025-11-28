<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            // relasi ke user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // detail dari properti
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->bigInteger('harga');
            $table->string('lokasi');
            $table->string('tipe');

            // spesifikasi rumah, opsional kalo tidak ada (nullable)
            $table->integer('luas_tanah')->nullable();
            $table->integer('luas_bangunan')->nullable();
            $table->integer('jumlah_kamar')->nullable();
            $table->integer('jumlah_kamar_mandi')->nullable();

            // property image
            $table->string('image_cover')->nullable();

            // Status properti
            $table->string('status')->default('tersedia'); 
            // $table->enum('status', ['tersedia', 'terjual'])->default('tersedia');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
