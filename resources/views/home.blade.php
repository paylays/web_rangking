@extends('layouts.base', ['subtitle' => 'Lock Screen'])

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
                                   <div class="mx-auto mb-4 text-center auth-logo">
                                        <h3>Sistem Cerdas Pendukung Keputusan</h3>
                                   </div>
                                        <p class="text-muted">Membantu proses seleksi siswa berprestasi secara objektif dan efisien dengan metode SAW (Simple Additive Weighting).</p>
                              </div>
                              <div class="mt-4 mb-1 text-center d-grid">
                                   <a href="{{ route('login') }}" class="btn btn-dark btn-lg fw-medium">Klik Disini</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

@endsection