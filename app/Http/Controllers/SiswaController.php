<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('nama_siswa', 'asc')->get();
        
        return view('pages.siswa.index', compact('siswas'));
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
}
