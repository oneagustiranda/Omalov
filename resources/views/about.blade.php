@extends('layouts.main')

@section('container')
    <div class="container mt-2">
        <h1>Halaman about</h1>
        <h3>{{ $name }}</h3>
        <p>{{ $email }}</p>
    </div>
    
@endsection