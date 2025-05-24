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
@if (session('error'))
    <div id="dismiss-example-error" class="alert alert-danger alert-icon" role="alert">
        <div class="d-flex align-items-center">
            <div class="avatar-sm rounded bg-danger d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                <i class="bx bx-info-circle text-white"></i>
            </div>
            <div class="flex-grow-1">
                {{ session('error') }}
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
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div>
                <small class="text-muted">Menampilkan {{ count($siswas) }} data siswa</small>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('siswa.template-download') }}" class="text-decoration-underline">
                    Link Template Excel
                </a>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="bx bx-cloud me-1"></i> Import
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Tambah
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-centered">
                <thead>
                    <tr>
                        <th scope="col">Kode Siswa</th>
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
                            <td>{{ $item->kode_siswa }}</td>
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
                                <a href="#" 
                                    class="text-danger" 
                                    title="Hapus"   
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama_siswa }}">
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

@include('pages.siswa.create')

@include('pages.siswa.delete')

@endsection

@section('scripts')

<script>
document.querySelectorAll('a[data-bs-target="#deleteModal"]').forEach(btn => {
    btn.addEventListener('click', function () {
        const id = this.dataset.id;
        const nama = this.dataset.nama;

        document.getElementById('data-nama').textContent = nama;

        const form = document.getElementById('deleteForm');
        form.action = `/siswa/${id}`; 
    });
});
</script>

@endsection