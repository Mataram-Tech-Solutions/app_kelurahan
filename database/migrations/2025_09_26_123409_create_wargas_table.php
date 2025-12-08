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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            // Kolom keluarga_id akan ditambahkan nanti setelah tabel keluarga dibuat
            // untuk menghindari circular dependency. Ini adalah praktik yang aman.
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap', 100);
            $table->integer('status_hubungan');
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->integer('jenis_kelamin');
            $table->string('pekerjaan', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};