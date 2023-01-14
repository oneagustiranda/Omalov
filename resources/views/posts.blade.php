@extends('layouts.main')

@section('container')
    <div class="container mt-2">
        <h1 class="mb-3 text-center">{{ $title }}</h1>

        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </div>
                </form>
            </div>
        </div>

        @if ($posts->count())
            @foreach ($posts as $item)
                <article class="mb-5 border-bottom pb-4">
                    @if ($item->image)
                        <div style="max-height: 350px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->category->name }}" class="img-fluid">
                        </div>            
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $item->category->name }}" alt="{{ $item->category->name }}" class="img-fluid">
                    @endif
                    <h2>
                        <a href="/posts/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a>
                    </h2>
                    {{-- <p>By. <a href="/posts?author={{ $item->author->username }}" class="text-decoration-none">{{ $item->author->name }}</a> in <a href="/posts?category={{ $item->category->slug }}" class="text-decoration-none">{{ $item->category->name }}</a></p> --}}

                    <p>{{ $item->excerpt }}</p>

                    <a href="/posts/{{ $item->slug }}" class="text-decoration-none">Read more..</a>
                </article>
            @endforeach
        
        @else
            <p class="text-center fs-4">No post found.</p>
        @endif
        
        <div class="d-flex justify-content-end">
            {{ $posts->links() }}
        </div>
    </div>
@endsection