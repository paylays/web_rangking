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
                                        <a href="#" class="logo-dark">
                                             <img src="/images/logo-dark.png" height="32" alt="logo dark">
                                        </a>

                                        <a href="#" class="logo-light">
                                             <img src="/images/logo-light.png" height="28" alt="logo light">
                                        </a>
                                   </div>
                                   <h4 class="fw-bold text-dark mb-2">Hi!</h3>
                                        <p class="text-muted">Enter your button below to login.</p>
                              </div>
                              <div class="mt-4 mb-1 text-center d-grid">
                                   <a href="{{ route('login') }}" class="btn btn-dark btn-lg fw-medium">Click here</a>
                              </div>
                         </div>
                    </div>
                    <p class="text-center mt-4 text-white text-opacity-50">Not you? return
                         <a href="#" class="text-decoration-none text-white fw-bold">Sign Up</a>
                    </p>
               </div>
          </div>
     </div>
</div>

@endsection