<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            if (empty($row['kode_siswa'])) {
                return null;
            }

            return new Siswa([
                'kode_siswa' => $row['kode_siswa'],
                'nama_siswa' => $row['nama_siswa'],
                'nilai_akademik' => $row['nilai_akademik'],
                'kehadiran' => $row['kehadiran'],
                'sikap_perilaku' => $row['sikap_perilaku'],
                'partisipasi_ekstrakurikuler' => $row['partisipasi_ekstrakurikuler'],
                'prestasi_non_akademik' => $row['prestasi_non_akademik'],
                'jumlah_pelanggaran_tt_disiplin' => $row['jumlah_pelanggaran_tt_disiplin'],
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal import baris siswa: ' . json_encode($row) . ' - ' . $e->getMessage());
            return null;
        }
    }
}
