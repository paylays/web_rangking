@extends('layouts.vertical', ['subtitle' => 'Hasil Seleksi'])

@section('content')

@include('layouts.partials/page-title', ['title' => 'Web Ranking', 'subtitle' => 'Hasil Seleksi'])

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
            Tabel Hasil Seleksi
        </h5>
        <p class="card-subtitle">
            .......
        </p>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered">
                <thead>
                    <tr>
                        <th scope="col">Kode Siswa</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Nilai Preferensi</th>
                        <th scope="col">Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rankingMatrix as $item)
                        <tr>
                            <td>{{ $item['kode_siswa'] }}</td>
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
</div>

@endsection