@extends('layouts.nonavbar')

@section('container')
    <section class="register d-flex">
        <div class="register-left h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="form-container">
                    <div class="header mb-4">
                        <a href="/" class="btn btn-sm rounded-pill btn-outline-primary">&#8592;</a>
                        <h1 class="h3 fw-bold mt-3">Daftar</h1>
                        <p>Bergabung dengan Omalov untuk memulai mencari pasangan</p>
                    </div>
        
                    <div class="form-registration">
                        <form method="POST" action="/register">
                            @csrf
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Agust Randa" required value="{{ old('name') }}">
                                <label for="name">Nama lengkap</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="agustranda" required value="{{ old('username') }}">
                                <label for="username">Nama pengguna</label>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                                <label for="email">Alamat email</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                <label for="password">Kata sandi</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                              
                          <button class="w-100 btn rounded-pill btn-primary mt-3" type="submit">Daftar Akun</button>
                        </form>
                        <small class="d-block text-center mt-3">Sudah punya Akun? <a href="/login">Masuk</a></small>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="register-right bg-primary">

        </div>
    </section>
@endsection