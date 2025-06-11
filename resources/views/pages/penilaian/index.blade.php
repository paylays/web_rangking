@extends('layouts.vertical', ['subtitle' => 'Penilaian'])

@section('content')

@include('layouts.partials/page-title', ['title' => 'Web Ranking', 'subtitle' => 'Penilaian'])

<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            Perhitungan Penilaian Alternatif
        </h5>
        <p class="card-subtitle">
            Sistem ini menampilkan proses perhitungan metode Simple Additive Weighting (SAW) untuk pemilihan siswa berprestasi. 
            Proses dimulai dengan konversi nilai kriteria siswa menjadi nilai fuzzy berdasarkan subkriteria yang telah ditentukan. 
            Selanjutnya, dilakukan normalisasi nilai fuzzy untuk menyamakan skala nilai antar kriteria dengan sifat benefit atau cost. 
            Setelah itu, sistem menghitung nilai preferensi untuk setiap siswa dengan mengalikan bobot kriteria dan nilai normalisasi. 
            Akhirnya, hasil preferensi digunakan untuk menentukan peringkat siswa sebagai dasar pengambilan keputusan.
        </p>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a href="#fuzzyTab" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                    <span class="d-block d-sm-none"><i class="bx bx-home"></i></span>
                    <span class="d-none d-sm-block">Konversi Nilai Fuzzy</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#normalisasiTab" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span class="d-block d-sm-none"><i class="bx bx-user"></i></span>
                    <span class="d-none d-sm-block">Hasil Normalisasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#preferensiTab" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span class="d-block d-sm-none"><i class="bx bx-envelope"></i></span>
                    <span class="d-none d-sm-block">Nilai Preferensi</span>
                </a>
            </li>
        </ul>
        <div class="tab-content pt-2 text-muted">
            <div class="tab-pane show active" id="fuzzyTab">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tabel Konversi Nilai Fuzzy
                        </h5>
                        <p class="card-subtitle mb-3">
                            Tampilan hasil konversi nilai data real alternatif ke nilai fuzzy.
                        </p>
                        <div class="d-flex align-items-center gap-2">
                            <!-- App Search-->
                            <form class="app-search me-auto" onsubmit="return false;">
                                <div class="position-relative">
                                    <input type="search" class="form-control" placeholder="Cari di tabel..." autocomplete="off" value="">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <small class="text-muted">Menampilkan {{ count($fuzzyMatrix) }} konversi nilai fuzzy</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered" id="table-fuzzy">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Siswa</th>
                                        <th scope="col">C1</th>
                                        <th scope="col">C2</th>
                                        <th scope="col">C3</th>
                                        <th scope="col">C4</th>
                                        <th scope="col">C5</th>
                                        <th scope="col">C6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($fuzzyMatrix as $index => $row)
                                        <tr>
                                            <td>{{ $row['kode_siswa'] }}</td>
                                            <td>{{ number_format($row['nilai_fuzzy']['C1'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_fuzzy']['C2'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_fuzzy']['C3'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_fuzzy']['C4'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_fuzzy']['C5'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_fuzzy']['C6'], 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada nilai konversi fuzzy.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane" id="normalisasiTab">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tabel Normalisasi Nilai
                        </h5>
                        <p class="card-subtitle mb-3">
                            Nilai pada tabel ini merupakan hasil normalisasi dari nilai fuzzy setiap kriteria berdasarkan metode SAW. 
                            Kriteria bertipe <strong>benefit</strong> dinormalisasi dengan membagi nilai dengan nilai maksimum, 
                            sedangkan kriteria bertipe <strong>cost</strong> dinormalisasi dengan membagi nilai minimum dengan nilai tersebut.
                        </p>
                        <div class="d-flex align-items-center gap-2">
                            <!-- App Search-->
                            <form class="app-search me-auto" onsubmit="return false;">
                                <div class="position-relative">
                                    <input type="search" class="form-control" placeholder="Cari di tabel..." autocomplete="off" value="">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <small class="text-muted">Menampilkan {{ count($normalisasiMatrix) }} hasil normalisasi</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered" id="table-normalisasi">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Siswa</th>
                                        <th scope="col">C1</th>
                                        <th scope="col">C2</th>
                                        <th scope="col">C3</th>
                                        <th scope="col">C4</th>
                                        <th scope="col">C5</th>
                                        <th scope="col">C6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($normalisasiMatrix  as $index => $row)
                                        <tr>
                                            <td>{{ $row['kode_siswa'] }}</td>
                                            <td>{{ number_format($row['nilai_normalisasi']['C1'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_normalisasi']['C2'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_normalisasi']['C3'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_normalisasi']['C4'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_normalisasi']['C5'], 2) }}</td>
                                            <td>{{ number_format($row['nilai_normalisasi']['C6'], 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada hasil normalisasi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane" id="preferensiTab">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tabel Nilai Preferensi
                        </h5>
                        <p class="card-subtitle mb-3">
                            Hasil perhitungan preferensi berdasarkan metode SAW (Simple Additive Weighting), 
                            tanpa dilakukan proses perangkingan.
                        </p>
                        <div class="d-flex align-items-center gap-2">
                            <!-- App Search-->
                            <form class="app-search me-auto" onsubmit="return false;">
                                <div class="position-relative">
                                    <input type="search" class="form-control" placeholder="Cari di tabel..." autocomplete="off" value="">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <small class="text-muted">Menampilkan {{ count($preferensiMatrix) }} hasil nilai preferensi</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered" id="table-preferensi">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Siswa</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Nilai Preferensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($preferensiMatrix  as $index => $row)
                                        <tr>
                                            <td>{{ $row['kode_siswa'] }}</td>
                                            <td>{{ $row['nama_siswa'] }}</td>
                                            <td>{{ number_format($row['nilai_preferensi'], 4) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada nilai preferensi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInputs = document.querySelectorAll('.app-search input[type="search"]');

        searchInputs.forEach(function (input) {
            input.addEventListener('keyup', function () {
                const filter = input.value.toLowerCase();
                const tabPane = input.closest('.tab-pane');
                const table = tabPane.querySelector('table');
                const rows = table.querySelectorAll('tbody tr');

                rows.forEach(function (row) {
                    const rowText = row.textContent.toLowerCase();
                    row.style.display = rowText.includes(filter) ? '' : 'none';
                });
            });
        });
    });
</script>



@endpush