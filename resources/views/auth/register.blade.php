@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
<section class="vh-100 bg-primary">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-5 mt-md-4 pb-5">
  
                <h2 class="fw-bold mb-2 text-uppercase">{{__("Registro")}}</h2>
                <p class="text-50 mb-5"></p>

                <div class="form-outline form-white mb-4">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                  <label class="form-label" for="name">Name</label>
                </div>
  
                <div class="form-outline form-white mb-4">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <input type="email" id="typeEmailX" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                  <label class="form-label" for="typeEmailX">Email</label>
                </div>
  
                <div class="form-outline form-white mb-4">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <input type="password" id="typePasswordX" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                  <label class="form-label" for="typePasswordX">Password</label>
                </div>
                <div class="form-outline form-white mb-4">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <input type="password" id="confirmPassword" class="form-control form-control-lg @error('password-confirm') is-invalid @enderror" name="password-confirm" required autocomplete="current-password" />
                  <label class="form-label" for="confirmPassword">Confirm Password</label>
                </div>
  
                <button class="btn btn-secondary btn-lg px-5 text-white" type="submit">Register</button>
  <!--
                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class=""><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class=""><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class=""><i class="fab fa-google fa-lg"></i></a>
                </div>
            -->
              </div>
              <div>
                <p class="mb-0">You have an account? <a href="{{route('login')}}">Sign In</a>
                </p>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
@endsection
