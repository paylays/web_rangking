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
        <p class="card-subtitle mb-3">
            Tabel ini menampilkan hasil akhir seleksi siswa berprestasi berdasarkan perhitungan metode SAW (Simple Additive Weighting). 
            Nilai preferensi menunjukkan skor akhir setiap siswa setelah mempertimbangkan seluruh kriteria, 
            dan peringkat menentukan urutan berdasarkan nilai tertinggi ke terendah.
        </p>
        <div class="d-flex align-items-center gap-2">
            <!-- App Search-->
            <form class="app-search me-auto" onsubmit="return false;">
                <div class="position-relative">
                    <input type="search" class="form-control" placeholder="Cari hasil seleksi..." autocomplete="off" value="">
                </div>
            </form>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered" id="hasil-table">
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

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.querySelector('.app-search input[type="search"]');
        const table = document.getElementById('hasil-table');
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