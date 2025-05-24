@extends('layouts.vertical', ['subtitle' => 'Penilaian'])

@section('content')

@include('layouts.partials/page-title', ['title' => 'Base UI', 'subtitle' => 'Penilaian'])

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
                        <p class="card-subtitle">
                            Menampilkan hasil konversi nilai data real alternatif ke nilai fuzzy.
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Alternatif Siswa</th>
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
                                            <td>{{ $index + 1 }}</td>
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
                <p class="mb-0">Li Europan lingues es membres del sam familie. Lor separat existentie es un
                    myth. Por scientie, musica, sport etc,
                </p>
            </div>
            <div class="tab-pane" id="preferensiTab">
                <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium,
                </p>
            </div>
        </div>
    </div>
</div>

@endsection