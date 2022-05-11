@extends('layouts.main')

@section('container')
    <div class="container mt-2">
        <h1 class="mb-5">Post categories</h1>

        @foreach ($categories as $item)
            <ul>
                <li>
                    <a href="/posts?category={{ $item->slug }}">{{ $item->name }}</a>
                </li>
            </ul>
        @endforeach
    </div>
@endsection