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
        Schema::create('fundraisers', function (Blueprint $table) {
            $table->id();
            $table->string('profile_lembaga')->nullable();
            $table->string('nama_lembaga')->nullable();
            $table->string('jenis_badan_usaha')->nullable();
            $table->string('nomor_ijin')->nullable();
            $table->string('nomor_kemenkumham')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->text('alamat_lembaga')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('nama_pimpinan')->nullable();
            $table->string('nomor_hp_pimpinan')->nullable();
            $table->string('email_pimpinan')->nullable();
            $table->string('nama_bendahara')->nullable();
            $table->string('nomor_hp_bendahara')->nullable();
            $table->string('email_bendahara')->nullable();
            $table->string('nama_pj')->nullable();
            $table->string('nomor_pj')->nullable();
            $table->string('email_pj')->nullable();

            // File Uploads
            $table->string('cover')->nullable();
            $table->string('file_legalitas')->nullable();
            $table->string('file_kemenkumham')->nullable();
            $table->string('file_rekening')->nullable();
            $table->string('file_pernyataan')->nullable();
            $table->string('file_struktur')->nullable();
            $table->string('file_surat_tugas')->nullable();
            $table->string('file_ktp')->nullable();

            $table->string('register_status')->nullable();
            $table->integer('user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundraisers');
    }
};
