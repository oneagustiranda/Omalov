@extends('layouts.nonavbar')

@section('container')
    <section class="login d-flex">
      <div class="login-left h-100">
          <div class="row justify-content-center align-items-center h-100">
              <div class="form-container">
                  <div class="header mb-4">
                    <a href="/" class="btn btn-sm rounded-pill btn-outline-primary">&#8592;</a>
                    @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show mt-3 mb-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
      
                    @if(session()->has('loginError'))
                      <div class="alert alert-danger alert-dismissible fade show mt-3 mb-2" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <h1 class="h3 fw-bold mt-3">Masuk</h1>
                    <p>Selamat datang di Omalov, silahkan masuk untuk memulai</p>
                  </div>
      
                  <div class="form-login">
                    <form method="POST" action="/login">
                      @csrf
                      <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        <label for="email">Alamat email</label>
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Kata sandi</label>
                      </div>
                          
                      <button class="w-100 btn rounded-pill btn-primary mt-3" type="submit">Masuk</button>
                    </form>
                    <small class="d-block text-center mt-3">Belum punya Akun? <a href="/register">Daftar</a></small>
                  </div>
              </div>
          </div>
          
      </div>
      <div class="login-right bg-primary">

      </div>
    </section>
@endsection