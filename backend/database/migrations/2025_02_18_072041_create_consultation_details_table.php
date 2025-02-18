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
        Schema::create('consultation_details', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama lengkap
            $table->string('email'); // Email
            $table->string('phone')->nullable(); // Nomor telepon (opsional)
            $table->string('school')->nullable(); // Sekolah / Instansi
            $table->string('address')->nullable(); // Alamat domisili
            $table->string('category'); // Kategori masalah (Dropdown)
            $table->text('description'); // Deskripsi masalah
            $table->string('evidence')->nullable(); // Upload bukti (Foto/Video)
            $table->text('evidence_description')->nullable(); // Deskripsi bukti
            $table->enum('urgency', ['Rendah', 'Sedang', 'Tinggi']); // Tingkat urgensi
            $table->boolean('agreement'); // Persetujuan & Privasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_details');
    }
};
