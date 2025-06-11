@extends('layouts.vertical', ['subtitle' => 'Kriteria'])

@section('content')

@include('layouts.partials/page-title', ['title' => 'Web Ranking', 'subtitle' => 'Kriteria'])

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
            Tabel Kriteria
        </h5>
        <p class="card-subtitle mb-3">
            Daftar kriteria yang digunakan dalam proses penilaian siswa berprestasi. 
            Setiap kriteria memiliki bobot dan sifat (benefit atau cost) 
            yang akan digunakan dalam perhitungan metode SAW.
        </p>
        <div class="d-flex align-items-center gap-2">
            <!-- App Search-->
            <form class="app-search me-auto" onsubmit="return false;">
                <div class="position-relative">
                    <input type="search" class="form-control" placeholder="Cari kriteria..." autocomplete="off" value="">
                </div>
            </form>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered" id="kriteria-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kriterias as $index => $item)
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
                            <td colspan="6" class="text-center text-muted">Belum ada data kriteria.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.querySelector('.app-search input[type="search"]');
        const table = document.getElementById('kriteria-table');
        const tbody = table.querySelector('tbody');
        const rows = tbody.getElementsByTagName('tr');

        searchInput.addEventListener('keyup', function () {
            const filter = searchInput.value.toLowerCase();

            for (let i = 0; i < rows.length; i++) {
                const rowText = rows[i].textContent.toLowerCase();
                if (rowText.indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    });
</script>


@endpush