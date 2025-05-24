<?php

namespace App\Http\Controllers;

use App\Helpers\FuzzyHelper;
use App\Models\Kriteria;
use App\Models\Siswa;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function konversiFuzzy()
    {
        $dataSiswa = Siswa::all()->map(function ($siswa) {
            return [
                'kode_siswa' => $siswa->kode_siswa,
                'nama_siswa' => $siswa->nama_siswa,
                'nilai_akademik' => $siswa->nilai_akademik,
                'kehadiran' => $siswa->kehadiran,
                'sikap_perilaku' => $siswa->sikap_perilaku,
                'partisipasi_ekstrakurikuler' => $siswa->partisipasi_ekstrakurikuler,
                'prestasi_non_akademik' => $siswa->prestasi_non_akademik,
                'jumlah_pelanggaran_tt_disiplin' => $siswa->jumlah_pelanggaran_tt_disiplin,
            ];
        })->toArray();

        $fuzzyMatrix = FuzzyHelper::konversiFuzzy($dataSiswa);

        return view('pages.penilaian.index', compact('fuzzyMatrix'));
    }
}
