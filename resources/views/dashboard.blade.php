@extends('layouts.vertical', ['subtitle' => 'Dashboard'])

@section('content')

@include('layouts.partials/page-title', ['title' => 'Web Ranking', 'subtitle' => 'Dashboard'])

@if (session('success'))
    <div id="dismiss-example-success" class="alert alert-success alert-icon" role="alert">
        <div class="d-flex align-items-center">
            <div class="avatar-sm rounded bg-success d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                <i class="bx bx-check-shield text-white"></i>
            </div>
            <div class="flex-grow-1">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

<div id="mainContent">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Selamat Datang di Sistem Cerdas Pemilihan Siswa Berprestasi</h4>
                        <p class="text-muted">Sistem ini dirancang untuk membantu proses seleksi siswa berprestasi secara objektif dan efisien menggunakan metode SAW (Simple Additive Weighting).</p>
                    </div>
    
                    <div class="mb-3">
                        <h5 class="fw-semibold">Apa yang bisa Anda lakukan di sini?</h5>
                        <ul class="list-unstyled">
                            <li><i class="bx bx-check-circle text-success me-2"></i>Menambahkan data siswa sebagai alternatif</li>
                            <li><i class="bx bx-check-circle text-success me-2"></i>Melihat hasil perhitungan otomatis berdasarkan kriteria yang telah ditentukan</li>
                            <li><i class="bx bx-check-circle text-success me-2"></i>Melihat peringkat siswa berdasarkan skor akhir</li>
                            <li><i class="bx bx-check-circle text-success me-2"></i>Mengelola data kriteria dan bobot sesuai kebutuhan</li>
                        </ul>
                    </div>
    
                    <div>
                        <h5 class="fw-semibold">Langkah-langkah Penggunaan:</h5>
                        <ol class="ps-3">
                            <li>Masuk ke menu <strong>"Data Siswa"</strong> dan tambahkan siswa yang ingin dinilai.</li>
                            <li>Sistem akan secara otomatis mengkonversi data siswa berdasarkan subkriteria yang tersedia.</li>
                            <li>Nilai akan dinormalisasi dan dihitung menggunakan metode SAW.</li>
                            <li>Hasil akhir dapat Anda lihat pada halaman <strong>"Hasil Ranking"</strong>.</li>
                        </ol>
                        <p class="mt-2">Dengan sistem ini, proses pemilihan siswa berprestasi menjadi lebih mudah, cepat, dan transparan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-0 text-truncate">Total Kriteria</p>
                            <h3 class="text-dark mt-2 mb-0">{{ $kriterias->count() }}</h3>
                        </div>
    
                        <div class="col-6">
                            <div class="ms-auto avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="fluent:apps-list-detail-24-regular"
                                    class="fs-32 avatar-title text-primary"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart01"></div>
            </div>
        </div>
    
        <!-- Card 2 -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-0 text-truncate">Total Sub-Kriteria</p>
                            <h3 class="text-dark mt-2 mb-0">{{ $subkriterias->count() }}</h3>
                        </div>
    
                        <div class="col-6">
                            <div class="ms-auto avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="mdi:subdirectory-arrow-right"
                                    class="fs-32 avatar-title text-primary"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart02"></div>
            </div>
        </div>
    
        <!-- Card 3 -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-0 text-truncate">Total Alternatif Siswa</p>
                            <h3 class="text-dark mt-2 mb-0">{{ $siswas->count() }}</h3>
                        </div>
    
                        <div class="col-6">
                            <div class="ms-auto avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="mdi:account-school-outline"
                                    class="fs-32 avatar-title text-primary"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart03"></div>
            </div>
        </div>
    
        <!-- Card 4 -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-0 text-truncate">Avg Preferensi</p>
                            <h3 class="text-dark mt-2 mb-0">{{ number_format($avgPreferensi, 4) }}</h3>
                        </div>
    
                        <div class="col-6">
                            <div class="ms-auto avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="mdi:clipboard-edit-outline"
                                    class="fs-32 avatar-title text-primary"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart04"></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Kriteria</h4>
                    <a href="{{ route('kriteria') }}" class="btn btn-sm btn-light">
                        View All
                    </a>
                </div>
                <!-- end card-header-->
    
                <div class="card-body pb-1">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-centered">
                            <thead>
                                <th class="py-1">#</th>
                                <th class="py-1">Kode</th>
                                <th class="py-1">Nama Kriteria</th>
                                <th class="py-1">Bobot</th>
                                <th class="py-1">Jenis</th>
                            </thead>
                            <tbody>
                                @forelse ($kriterias->take(3) as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        @php
                                            $theme = session('theme', 'dark');
                                            $badgeColor = match($item->kode) {
                                                'C1' => 'primary',
                                                'C2' => 'secondary',
                                                'C3' => 'success',
                                                'C4' => 'danger',
                                                'C5' => 'warning',
                                                'C6' => $theme === 'light' ? 'light text-dark' : 'dark text-light',
                                                default => 'primary',
                                            };
                                        @endphp
    
                                        <td><span class="badge bg-{{ $badgeColor }}">{{ $item->kode }}</span></td>
                                        <td>{{ $item->nama_kriteria }}</td>
                                        <td>{{ number_format($item->bobot, 2) }}</td>
                                        <td>{{ ucfirst($item->jenis) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data kriteria.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
        </div>
    
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Ranking Siswa Berprestasi</h4>
                    <a href="{{ route('ranking') }}" class="btn btn-sm btn-light">
                        View All
                    </a>
                </div>
                <!-- end card-header-->
    
                <div class="card-body pb-1">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-centered">
                            <thead>
                                <th class="py-1">Nama Siswa</th>
                                <th class="py-1">Nilai Preferensi</th>
                                <th class="py-1">Peringkat</th>
                            </thead>
                            <tbody>
                                @forelse (collect($rankingMatrix)->take(3) as $item)
                                    <tr>
                                        <td>{{ $item['nama_siswa'] }}</td>
                                        <td>{{ number_format($item['nilai_preferensi'], 4) }}</td>
                                        @php
                                            $badgeColors = [
                                                1 => 'primary',
                                                2 => 'secondary',
                                                3 => 'success',
                                                4 => 'danger',
                                                5 => 'warning',
                                            ];
                                        @endphp
                                        <td>
                                            @php
                                                $color = $badgeColors[$item['rank']] ?? 'light text-dark';
                                            @endphp
                                            <span class="badge bg-{{ $color }}">{{ $item['rank'] }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada hasil seleksi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card-->
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Data Alternatif Siswa</h4>
                    <a href="{{ route('siswa') }}" class="btn btn-sm btn-light">
                        View All
                    </a>
                </div>
                <!-- end card-header-->
        
                <div class="card-body pb-1">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-centered">
                            <thead>
                                <th class="py-1">Kode Siswa</th>
                                <th class="py-1">Nama Siswa</th>
                                <th class="py-1">Nilai Akademik</th>
                                <th class="py-1">Kehadiran</th>
                                <th class="py-1">Sikap Perilaku</th>
                                <th class="py-1">Partisipasi Ekskul</th>
                                <th class="py-1">Prestasi NA</th>
                                <th class="py-1">Jmlh Pelanggaran Tt/Disiplin</th>
                            </thead>
                            <tbody>
                                @forelse ($siswas->take('10') as $index => $item)
                                    <tr>
                                        <td>{{ $item->kode_siswa }}</td>
                                        <td>{{ $item->nama_siswa }}</td>
                                        <td>{{ $item->nilai_akademik }}</td>
                                        <td>{{ $item->kehadiran }}</td>
                                        <td>{{ $item->sikap_perilaku }}</td>
                                        <td>{{ $item->partisipasi_ekstrakurikuler }}</td>
                                        <td>{{ $item->prestasi_non_akademik }}</td>
                                        <td>{{ $item->jumlah_pelanggaran_tt_disiplin }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Belum ada data siswa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@vite(['resources/js/pages/dashboard.js'])
@endsection