@extends('admin.layouts.main')

@section('container')
  <div class="col-sm-12 mt-5">
    <a href="/admin/masterdata/categories" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
  </div>

  <div class="page-header">
    <div class="col-sm-12 mt-4">
        <h3 class="page-title mt-3">Sunting kategori</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Master data</li>
          <li class="breadcrumb-item">Kategori tulisan</li>
          <li class="breadcrumb-item active">Sunting kategori</li>
        </ul>
    </div>
  </div>

  <div class="col-lg-8 col-sm-12 mt-4">
    <div class="card">
      <div class="card-body mb-4">
        <form method="POST" action="/admin/masterdata/categories/{{ $category->slug }}" enctype="multipart/form-data">
          @method('put')
          @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama kategori</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" autofocus>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="slug" name="slug" value="{{ old('slug', $category->slug) }}">
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div> 
            <button type="submit" class="btn btn-primary">Perbarui kategori</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('additional-js')
  <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
      fetch('/admin/masterdata/categories/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })

  </script>
@endsection