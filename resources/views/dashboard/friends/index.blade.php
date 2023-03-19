@extends('dashboard.layouts.main')

@section('container')

    <div class="d-grid gap-2 mt-3">
        <a href="/friends/list" class="btn btn-outline-secondary text-start" type="button">Daftar teman  
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    <div class="mt-3 mb-4">
        <h1 class="h3 fw-bold mt-3">Permintaan pertemanan</h1>
        <p>Tanggapi permintaan yang ada dan sabar untuk permintaanmu yang tertunda!</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 mb-5">
        @if (count($usersWithStatus) > 0)
            @foreach ($usersWithStatus as $user)
                @include('dashboard.component.card-user')
            @endforeach
        @else
            <div class="align-item-center">
                <p class="rounded-pill text-bg-light text-center p-1">Maaf untuk saat ini tidak ada permintaan pertemanan yang tertunda</p>
            </div>
        @endif
    </div>
@endsection