@extends('layouts.base', ['subtitle' => 'Sign In'])

@section('body-attribuet')
class="authentication-bg"
@endsection

@section('content')
<div class="account-pages py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h4 class="fw-bold text-dark mb-2">Login ke Sistem SPK Siswa Berprestasi!</h3>
                                <p class="text-muted">Gunakan akun Anda untuk mengakses fitur dan data seleksi siswa berprestasi berbasis metode SAW.</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="mt-4">

                            @csrf

                            @if (sizeof($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="user@example.com" placeholder="Masukkan email Anda">
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" value="user123" placeholder="Masukkan kata sandi">
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember-me">
                                <label class="form-check-label" for="remember-me">Ingat saya</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark btn-lg fw-medium" type="submit">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-4 text-white text-opacity-50">Don't have an account?
                    <a href="#" class="text-decoration-none text-white fw-bold">Sign Up</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection