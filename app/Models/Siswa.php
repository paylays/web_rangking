<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'nilai_akademik',
        'kehadiran',
        'sikap_perilaku',
        'partisipasi_ekstrakurikuler',
        'prestasi_non_akademik',
        'jumlah_pelanggaran_tt_disiplin',
    ];
}
