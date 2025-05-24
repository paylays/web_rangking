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

    public static function normalisasiSaw(array $fuzzyMatrix)
    {
        $normalisasi = [];

        $kriterias = Kriteria::all()->keyBy('kode');

        $nilaiPerKriteria = [];
        foreach ($fuzzyMatrix as $row) {
            foreach ($row['nilai_fuzzy'] as $kode => $nilai) {
                $nilaiPerKriteria[$kode][] = $nilai;
            }
        }

        $max = [];
        $min = [];
        foreach ($nilaiPerKriteria as $kode => $values) {
            $max[$kode] = max($values);
            $min[$kode] = min($values);
        }

        // Normalisasi
        foreach ($fuzzyMatrix as $row) {
            $nilaiNormal = [];

            foreach ($row['nilai_fuzzy'] as $kode => $nilai) {
                $jenis = $kriterias[$kode]->jenis ?? 'benefit';

                if ($jenis === 'benefit') {
                    $nilaiNormal[$kode] = $max[$kode] > 0 ? $nilai / $max[$kode] : 0;
                } else {
                    $nilaiNormal[$kode] = $nilai > 0 ? $min[$kode] / $nilai : 0;
                }
            }

            $normalisasi[] = [
                'kode_siswa' => $row['kode_siswa'],
                'nama_siswa' => $row['nama_siswa'],
                'nilai_normalisasi' => $nilaiNormal,
            ];
        }

        return $normalisasi;
    }

    public static function hitungPreferensiSaw(array $normalisasiMatrix)
    {
        $preferensi = [];

        $kriterias = Kriteria::all()->keyBy('kode');

        foreach ($normalisasiMatrix as $row) {
            $nilaiNormalisasi = $row['nilai_normalisasi'];
            $nilaiPreferensi = 0;

            foreach ($nilaiNormalisasi as $kode => $nilai) {
                $bobot = $kriterias[$kode]->bobot ?? 0;
                $nilaiPreferensi += $nilai * $bobot;
            }

            $preferensi[] = [
                'kode_siswa' => $row['kode_siswa'],
                'nama_siswa' => $row['nama_siswa'],
                'nilai_preferensi' => $nilaiPreferensi,
            ];
        }

        return $preferensi;
    }

    public static function perankingan(array $preferensiMatrix)
    {
        usort($preferensiMatrix, function($a, $b) {
            return $b['nilai_preferensi'] <=> $a['nilai_preferensi'];
        });

        foreach ($preferensiMatrix as $index => &$item) {
            $item['rank'] = $index + 1;
        }

        return $preferensiMatrix;
    }


}
