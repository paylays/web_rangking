<?php

namespace App\Http\Controllers;

use App\Helpers\FuzzyHelper;
use App\Models\Siswa;

class PenilaianController extends Controller
{
    public function penilaian()
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
        $normalisasiMatrix = FuzzyHelper::normalisasiSaw($fuzzyMatrix);
        $preferensiMatrix = FuzzyHelper::hitungPreferensiSaw($normalisasiMatrix);
        $rankingMatrix = FuzzyHelper::perankingan($preferensiMatrix);

        return view('pages.penilaian.index', compact('fuzzyMatrix', 'normalisasiMatrix', 'preferensiMatrix', 'rankingMatrix'));
    }
}
