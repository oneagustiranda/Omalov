@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat datang, {{ auth()->user()->name }}</h1>
    </div>
    
    <form class="row mb-5">
        @csrf
        <div class="col-auto mb-1">
            <input type="number" name="min-age" id="min-age" class="form-control" placeholder="Usia minimum">
        </div>        
        <div class="col-auto mb-1">
            <input type="number" name="max-age" id="max-age" class="form-control" placeholder="Usia maksimum">
        </div>        
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @if ($activeUsersWithAge->count() > 0)
            @foreach ($activeUsersWithAge as $user)
                @if (!request('min-age') && !request('max-age'))
                    @include('dashboard.component.card-user')
                @elseif (($user['age'] >= request('min-age') && $user['age'] <= request('max-age'))
                        || ($user['age'] >= request('min-age') && !request('max-age'))
                        || (!request('min-age') && $user['age'] <= request('max-age')))
                    @include('dashboard.component.card-user')
                @endif
            @endforeach
        @else
            <div class="align-item-center">
                <p class="rounded-pill text-bg-light text-center p-1">Maaf untuk saat ini tidak ada pengguna yang cocok untuk ditampilkan</p>
            </div>
        @endif        
    </div>

@endsection