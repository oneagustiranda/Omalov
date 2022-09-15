@extends('layouts.main')

@section('container')
    <div class="p-5 mb-4">
        <p>testdasdsjj</p>
        <a href="/register" class="btn rounded-pill btn-primary">Mulai mencari &#8594;</a>

        <div class="home-content container py-5">
            <h1 class="display-5 fw-bold">Cari Pasangan?</h1>
            <p class="col-md-8 fs-5">Temukan pasangan yang serius untuk melanjutkan ke jenjang berikutnya </p>
            
            <div class="btn-group mt-5">
                <a href="/register" class="btn btn-primary" aria-current="page">Daftar</a>
                <a href="/login" class="btn btn-outline-primary">Masuk</a>
            </div>
        </div>
    </div>
    
@endsection