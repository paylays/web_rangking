<?php

namespace App\Http\Controllers;

use App\Helpers\FuzzyHelper;
use App\Models\Kriteria;
use App\Models\Siswa;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::orderBy('kode', 'asc')->get();
        $subkriterias = SubKriteria::with('kriteria')->get();
        $siswas = Siswa::orderBy('nama_siswa', 'asc')->get();

        $fuzzyMatrix = FuzzyHelper::konversiFuzzy($siswas->toArray());
        $normalisasiMatrix = FuzzyHelper::normalisasiSaw($fuzzyMatrix);
        $preferensiMatrix = FuzzyHelper::hitungPreferensiSaw($normalisasiMatrix);
        $rankingMatrix = FuzzyHelper::perankingan($preferensiMatrix);

        $avgPreferensi = collect($preferensiMatrix)->avg('nilai_preferensi');

        return view('index', compact('kriterias', 'subkriterias', 'siswas', 'fuzzyMatrix', 'normalisasiMatrix', 'preferensiMatrix', 'rankingMatrix', 'avgPreferensi'));
    }
}
