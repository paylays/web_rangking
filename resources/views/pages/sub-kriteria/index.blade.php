@extends('layouts.vertical', ['subtitle' => 'Sub Kriteria'])

@section('content')

@include('layouts.partials/page-title', ['title' => 'Web Ranking', 'subtitle' => 'Sub Kriteria'])

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
            Tabel Sub Kriteria
        </h5>
        <p class="card-subtitle">
            Daftar sub kriteria yang mendetailkan setiap kriteria utama dalam penilaian siswa berprestasi. 
            Sub kriteria ini berisi nilai dan deskripsi yang akan digunakan untuk mengkonversi data alternatif 
            ke dalam bentuk terstandardisasi dalam perhitungan metode SAW.
        </p>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Sub Kriteria</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groupedSubkriterias as $index => $group)
                        @foreach ($group as $key => $item)
                            <tr>
                                @if ($key === 0)
                                    <td rowspan="{{ count($group) }}">{{ $loop->parent->iteration }}</td>
                                    @php
                                        $theme = session('theme', 'dark');
                                        $badgeClass = match($item->kriteria->kode) {
                                            'C1' => 'primary',
                                            'C2' => 'secondary',
                                            'C3' => 'success',
                                            'C4' => 'danger',
                                            'C5' => 'warning',
                                            'C6' => $theme === 'light' ? 'light text-dark' : 'dark text-light',
                                            default => 'primary',
                                        };
                                    @endphp

                                    <td rowspan="{{ count($group) }}">
                                        <span class="badge bg-{{ $badgeClass }}">{{ $item->kriteria->kode }}</span>
                                    </td>
                                @endif
                                <td>{{ $item->nama_sub_kriteria }}</td>
                                <td>{{ number_format($item->bobot, 2) }}</td>
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
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data sub kriteria.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection