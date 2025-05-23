<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriterias')->insert([
            [
                'kode' => 'C1',
                'nama_kriteria' => 'Nilai Akademik',
                'bobot' => 0.35,
                'jenis' => 'benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C2',
                'nama_kriteria' => 'Kehadiran',
                'bobot' => 0.15,
                'jenis' => 'benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C3',
                'nama_kriteria' => 'Sikap dan Perilaku',
                'bobot' => 0.10,
                'jenis' => 'benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C4',
                'nama_kriteria' => 'Partisipasi Ekstrakurikuler',
                'bobot' => 0.15,
                'jenis' => 'benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C5',
                'nama_kriteria' => 'Prestasi Non-Akademik',
                'bobot' => 0.15,
                'jenis' => 'benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C6',
                'nama_kriteria' => 'Jumlah Pelanggaran Tata Tertib / Disiplin',
                'bobot' => 0.10,
                'jenis' => 'cost',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
