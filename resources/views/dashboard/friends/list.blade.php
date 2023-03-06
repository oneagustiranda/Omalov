@extends('dashboard.layouts.sub')

@section('container')

    <div class="mt-3 mb-4">
        <a href="/friends" class="btn btn-sm rounded-pill btn-outline-primary">&#8592;</a>
        <h1 class="h3 fw-bold mt-3">Teman</h1>
        <p>Mari mulai berkenalan dengan temanmu!</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach ($usersWithStatus as $user)
            @if ($user['status'] == 'friends')
                @include('dashboard.component.card-user')
                <p>hi</p>
            @else
                <div class="bg-red align-item-center">
                    <p class="rounded-pill text-bg-light text-center p-1">Kamu belum memiliki teman untuk diajak kenalan, mari cari teman</p>
                </div>
            @endif
        @endforeach
    </div>    

@endsection