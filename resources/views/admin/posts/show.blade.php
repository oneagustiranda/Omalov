@extends('admin.layouts.main')

@section('container')
<div class="col-sm-12 mt-5">
    <a href="/admin/posts" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
    <form action="/admin/posts/{{ $post->slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-outline-danger" onclick="return confirm('Anda akan menghapus post ini?')"><i class="fa-solid fa-trash"></i></button>
    </form>
</div>

<div class="col-sm-12 mt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="page-title">{{ $post->title }}</h3>
            <p class="text-muted">Ditulis oleh <span class="text-primary">{{ auth()->user()->name }}</span> dengan kategori <span class="text-primary">{{ $post->category->name }}</span></p>

            <article class="my-3"> 
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3 mb-2">
                    </div>            
                @else
                    <img src="/storage/content-images/no-image cover.png" alt="{{ $post->category->name }}" class="img-fluid mt-3 mb-2">
                @endif
        
                {!!  $post->body !!} 
            </article>
        </div>
    </div>
</div>
@endsection