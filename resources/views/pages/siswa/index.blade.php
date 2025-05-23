@extends('layouts.vertical', ['subtitle' => 'Alternatif Siswa'])

@section('content')

@include('layouts.partials/page-title', ['title' => 'Web Ranking', 'subtitle' => 'Alternatif Siswa'])

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

<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            Tabel Alternatif Siswa
        </h5>
        <p class="card-subtitle">
            Daftar alternatif siswa yang menjadi kandidat penilaian. 
            Setiap siswa dinilai berdasarkan nilai sub-kriteria dari masing-masing kriteria utama, 
            yang kemudian digunakan dalam proses perhitungan menggunakan metode SAW (Simple Additive Weighting).
        </p>
        <div class="d-flex justify-content-end align-items-center gap-3 mt-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                <i class="bx bx-cloud me-1"></i> 
                Import
            </button>
            <a href="{{ route('siswa.template-download') }}" class="text-decoration-underline">
                Link Template Excel
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Nilai Akademik</th>
                        <th scope="col">Kehadiran</th>
                        <th scope="col">Sikap Perilaku</th>
                        <th scope="col">Partisipasi Ekskul</th>
                        <th scope="col">Prestasi NA</th>
                        <th scope="col">Jmlh Pelanggaran Tt/Disiplin</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswas as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->nilai_akademik }}</td>
                            <td>{{ $item->kehadiran }}</td>
                            <td>{{ $item->sikap_perilaku }}</td>
                            <td>{{ $item->partisipasi_ekstrakurikuler }}</td>
                            <td>{{ $item->prestasi_non_akademik }}</td>
                            <td>{{ $item->jumlah_pelanggaran_tt_disiplin }}</td>
                            <td>
                                <a href="#" class="text-info me-2" title="Detail">
                                    <iconify-icon icon="solar:info-square-bold" class="fs-3"></iconify-icon>
                                </a>
                                <a href="#" class="text-warning me-2" title="Ubah">
                                    <iconify-icon icon="solar:pen-new-square-bold" class="fs-3"></iconify-icon>
                                </a>
                                <a href="#" class="text-danger" title="Hapus">
                                    <iconify-icon icon="solar:trash-bin-trash-bold" class="fs-3"></iconify-icon>
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('pages.siswa.import')

@endsection