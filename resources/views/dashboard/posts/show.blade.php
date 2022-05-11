@extends('dashboard.layouts.main')

@section('container')
    <h2>{{ $post->title }}</h2>
    <a href="/dashboard/posts" class="btn btn-success">Back to my posts</a>
    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Anda akan menghapus post ini?')">hapus</button>
      </form>
    <article class="my-3"> 
        @if ($post->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            </div>            
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
        @endif

        {!!  $post->body !!} 
    </article>


@endsection