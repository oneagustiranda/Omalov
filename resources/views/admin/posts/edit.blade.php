@extends('admin.layouts.main')

@section('container')
<div class="col-sm-12 mt-5">
  <a href="/admin/posts" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
</div>

<div class="page-header">
  <div class="col-sm-12 mt-4">
      <h3 class="page-title mt-3">Sunting tulisan</h3>
      <ul class="breadcrumb">
          <li class="breadcrumb-item">Tulisanku</li>
          <li class="breadcrumb-item active">Sunting tulisan</li>
      </ul>
  </div>
</div>

<div class="col-lg-8 col-sm-12 mt-4">
  <div class="card">
    <div class="card-body mb-4">
      <form method="POST" action="/admin/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Judul tulisan</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" autofocus>
            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <div class="input-group">
              <span class="input-group-text">https://omalov.com/posts/</span>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-text">Pastikan slug unik dan mudah dimengerti.</div>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Kategori tulisan</label>
            <select class="form-select" name="category_id">
              @foreach ($categories as $category)
                @if(old('category_id', $post->category_id) == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
              @endforeach            
            </select>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Pilih gambar sampul</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if ($post->image)
              <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 sm-5 d-block">
            @else
              <img class="img-preview img-fluid mb-3 sm-5">
            @endif
            
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">Isi tulisan</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body" class="bg-white"></trix-editor>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Perbarui tulisan</button>
      </form>
    </div>
  </div>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/admin/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  })

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  //preview image
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection