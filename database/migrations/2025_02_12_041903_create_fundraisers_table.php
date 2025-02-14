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
            $table->string('nama_lembaga')->nullable();
            $table->string('jenis_badan_usaha')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->text('alamat_lembaga')->nullable();
            $table->string('email_lembaga')->nullable();
            $table->string('nomor_telpon')->nullable();
            $table->string('nomor_ijin')->nullable();
            $table->string('nomor_kemenkumham')->nullable();
            $table->string('nomor_npwp')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_rekening')->nullable();

            // File Uploads
            $table->string('image_ijin')->nullable();
            $table->string('image_kemenkumham')->nullable();
            $table->string('image_npwp')->nullable();
            $table->string('image_buku_tabungan')->nullable();

            // Data Penanggung Jawab
            $table->string('nama_pj')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('email_pj')->nullable();
            $table->string('nomor_pj')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nama_pimpinan')->nullable();
            $table->string('nomor_hp_pimpinan')->nullable();
            $table->string('nama_bendahara')->nullable();
            $table->string('nomor_hp_bendahara')->nullable();

            // File Uploads Penanggung Jawab
            $table->string('image_doc_pj')->nullable();
            $table->string('image_struktur_org')->nullable();
            $table->string('image_ktp')->nullable();
            
            $table->string('register_status')->nullable();

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
