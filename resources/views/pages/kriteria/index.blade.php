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
        <p class="card-subtitle">
            Daftar kriteria yang digunakan dalam proses penilaian siswa berprestasi. 
            Setiap kriteria memiliki bobot dan sifat (benefit atau cost) 
            yang akan digunakan dalam perhitungan metode SAW.
        </p>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered">
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
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection