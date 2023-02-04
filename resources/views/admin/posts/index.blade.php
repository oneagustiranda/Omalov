@extends('admin.layouts.main')

@section('container')
    <div class="page-header">
      <div class="row">
          <div class="col-sm-12 mt-5">
              <h3 class="page-title mt-3">Tulisanku</h3>
              <ul class="breadcrumb">
                  <li class="breadcrumb-item">Hi {{ auth()->user()->name }}, semangat nulisnyaa!</li>
              </ul>
          </div>
      </div>
    </div>

    <div class="row">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      <div class="col-sm-12">
        <div class="card card-table">
          <div class="card-body booking_card">
            <div class="table-responsive">
              <a href="/admin/posts/create" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Buat tulisan baru</a>
              <table class="datatable table table-sm table-stripped table-hover table-center mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>
                          <a href="/admin/posts/{{ $post->slug }}" class="badge bg-info"><i class="fa-solid fa-eye"></i></a>
                          <a href="/admin/posts/{{ $post->slug }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen"></i></a>
                          <form action="/admin/posts/{{ $post->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Anda akan menghapus post ini?')"><i class="fa-solid fa-trash"></i></button>
                          </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection