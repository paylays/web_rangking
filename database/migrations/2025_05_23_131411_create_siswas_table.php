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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_siswa')->unique();
            $table->string('nama_siswa');
            $table->string('nilai_akademik'); 
            $table->string('kehadiran'); 
            $table->string('sikap_perilaku');
            $table->string('partisipasi_ekstrakurikuler');
            $table->string('prestasi_non_akademik');
            $table->string('jumlah_pelanggaran_tt_disiplin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
