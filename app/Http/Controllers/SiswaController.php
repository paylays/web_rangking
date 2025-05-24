<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('nama_siswa', 'asc')->get();

        $subkriterias = SubKriteria::with('kriteria')->get()->groupBy(fn($item) => $item->kriteria->kode);
        
        return view('pages.siswa.index', compact('siswas', 'subkriterias'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_siswa' => 'required|string|max:255|unique:siswas,kode_siswa',
                'nama_siswa' => 'required|string|max:255',
                'subkriteria' => 'required|array',
                'subkriteria.*' => 'required|exists:sub_kriterias,id',
            ]);

            $nilai_akademik = SubKriteria::findOrFail($request->subkriteria['C1'])->nama_sub_kriteria;
            $kehadiran = SubKriteria::findOrFail($request->subkriteria['C2'])->nama_sub_kriteria;
            $sikap_perilaku = SubKriteria::findOrFail($request->subkriteria['C3'])->nama_sub_kriteria;
            $partisipasi_ekstrakurikuler = SubKriteria::findOrFail($request->subkriteria['C4'])->nama_sub_kriteria;
            $prestasi_non_akademik = SubKriteria::findOrFail($request->subkriteria['C5'])->nama_sub_kriteria;
            $jumlah_pelanggaran_tt_disiplin = SubKriteria::findOrFail($request->subkriteria['C6'])->nama_sub_kriteria;

            Siswa::create([
                'kode_siswa' => $request->kode_siswa,
                'nama_siswa' => $request->nama_siswa,
                'nilai_akademik' => $nilai_akademik,
                'kehadiran' => $kehadiran,
                'sikap_perilaku' => $sikap_perilaku,
                'partisipasi_ekstrakurikuler' => $partisipasi_ekstrakurikuler,
                'prestasi_non_akademik' => $prestasi_non_akademik,
                'jumlah_pelanggaran_tt_disiplin' => $jumlah_pelanggaran_tt_disiplin,
            ]);

            return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal simpan siswa: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data siswa.');
        }
    }

    public function downloadTemplate()
    {
        $filePath = public_path('templates/template_alternatif_siswa.xlsx');

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'File template tidak ditemukan.'); 
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file_excel_siswa' => 'required|file|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new SiswaImport, $request->file('file_excel_siswa'));

            return redirect()->route('siswa')->with('success', 'Data siswa berhasil diimpor dari Excel.');
        } catch (\Exception $e) {
            Log::error('Gagal import Excel Siswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor file.');
        }
    }

    public function destroy($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();

            return redirect()->back()->with('success', 'Data siswa berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal hapus siswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data siswa.');
        }
    }

}
