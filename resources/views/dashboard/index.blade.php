@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat datang, {{ auth()->user()->name }}</h1>
    </div>

    {{-- Filter to show specific user --}}
    
    <form class="row mb-5">
        @csrf
        <div class="col-auto mb-1">
            <input type="number" name="min-age" id="min-age" class="form-control" placeholder="Minimum Age">
        </div>        
        <div class="col-auto mb-1">
            <input type="number" name="max-age" id="max-age" class="form-control" placeholder="Maximum Age">
        </div>        
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">Filter</button>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        
    @foreach ($activeUsersWithAge as $user)
        @if (!request('min-age') && !request('max-age'))
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $user['name'] }} 
                        <span class="badge rounded-pill bg-secondary">{{ $user['age'] }} Tahun</span>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $user['city'] }}</h6>
                    <p class="card-text">Tanpa filter umur Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> 
        @elseif (($user['age'] >= request('min-age') && $user['age'] <= request('max-age'))
                || ($user['age'] >= request('min-age') && !request('max-age'))
                || (!request('min-age') && $user['age'] <= request('max-age')))
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $user['name'] }} 
                        <span class="badge rounded-pill bg-secondary">{{ $user['age'] }} Tahun</span>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $user['city'] }}</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> 
        @endif
    @endforeach
               
    </div>

@endsection