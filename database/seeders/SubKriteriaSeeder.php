<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'C1' => [
                ['nama' => '< 60', 'bobot' => 0.2],
                ['nama' => '60-69', 'bobot' => 0.4],
                ['nama' => '70-79', 'bobot' => 0.6],
                ['nama' => '80-89', 'bobot' => 0.8],
                ['nama' => '≥ 90', 'bobot' => 1.0],
            ],
            'C2' => [
                ['nama' => '< 75%', 'bobot' => 0.2],
                ['nama' => '75%-84%', 'bobot' => 0.4],
                ['nama' => '85%-94%', 'bobot' => 0.6],
                ['nama' => '95%-99%', 'bobot' => 0.8],
                ['nama' => '100%', 'bobot' => 1.0],
            ],
            'C3' => [
                ['nama' => 'Buruk', 'bobot' => 0.2],
                ['nama' => 'Kurang', 'bobot' => 0.4],
                ['nama' => 'Cukup', 'bobot' => 0.6],
                ['nama' => 'Baik', 'bobot' => 0.8],
                ['nama' => 'Sangat Baik', 'bobot' => 1.0],
            ],
            'C4' => [
                ['nama' => 'Tidak Pernah Ikut', 'bobot' => 0.2],
                ['nama' => '1 Kegiatan', 'bobot' => 0.4],
                ['nama' => '2-3 Kegiatan', 'bobot' => 0.6],
                ['nama' => '4 Kegiatan', 'bobot' => 0.8],
                ['nama' => '≥ 5 Kegiatan', 'bobot' => 1.0],
            ],
            'C5' => [
                ['nama' => 'Tidak ada', 'bobot' => 0.2],
                ['nama' => 'Sertifikat Partisipasi / Peserta', 'bobot' => 0.4],
                ['nama' => 'Juara Tingkat Sekolah', 'bobot' => 0.6],
                ['nama' => 'Juara Tingkat Kecamatan / Kabupaten', 'bobot' => 0.8],
                ['nama' => 'Juara Provinsi / Nasional', 'bobot' => 1.0],
            ],
            'C6' => [
                ['nama' => 'Tidak Pernah Melanggar', 'bobot' => 0.2],
                ['nama' => 'Jarang Melanggar (1-2 kali)', 'bobot' => 0.4],
                ['nama' => 'Kadang Melanggar (3-4 kali)', 'bobot' => 0.6],
                ['nama' => 'Sering Melanggar (5-6 kali)', 'bobot' => 0.8],
                ['nama' => 'Sangat Sering / Berulang (≥7 kali)', 'bobot' => 1.0],
            ],
        ];

        foreach ($data as $kode => $subkriterias) {
            $kriteria = Kriteria::where('kode', $kode)->first();

            if ($kriteria) {
                foreach ($subkriterias as $sub) {
                    SubKriteria::create([
                        'kriteria_id' => $kriteria->id,
                        'nama_sub_kriteria' => $sub['nama'],
                        'bobot' => $sub['bobot'],
                    ]);
                }
            }
        }
    }
}
