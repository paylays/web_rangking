<?php

namespace App\Helpers;

use App\Models\Kriteria;

class FuzzyHelper
{
    public static function konversiFuzzy(array $dataSiswa)
    {
        $hasil = [];

        foreach ($dataSiswa as $siswa) {
            $nilaiFuzzy = [];
            $kriterias = Kriteria::with('subKriteria')->get();

            foreach ($kriterias as $kriteria) {
                $kode = $kriteria->kode;
                $fieldMapping = [
                    'C1' => 'nilai_akademik',
                    'C2' => 'kehadiran',
                    'C3' => 'sikap_perilaku',
                    'C4' => 'partisipasi_ekstrakurikuler',
                    'C5' => 'prestasi_non_akademik',
                    'C6' => 'jumlah_pelanggaran_tt_disiplin',
                ];

                $field = $fieldMapping[$kode] ?? null;

                if ($field && isset($siswa[$field])) {
                    $nilai = $siswa[$field];
                    $bobot = $kriteria->subKriteria
                        ->firstWhere('nama_sub_kriteria', $nilai)
                        ->bobot ?? 0;

                    $nilaiFuzzy[$kode] = $bobot;
                } else {
                    $nilaiFuzzy[$kode] = 0;
                }
            }

            $hasil[] = [
                'kode_siswa' => $siswa['kode_siswa'],
                'nama_siswa' => $siswa['nama_siswa'],
                'nilai_fuzzy' => $nilaiFuzzy,
            ];
        }

        return $hasil;
    }
}
