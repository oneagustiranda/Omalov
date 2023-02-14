@extends('admin.layouts.main')

@section('container')
    <div class="page-header">
      <div class="row">
          <div class="col-sm-12 mt-5">
              <h3 class="page-title mt-3">Kategori Tulisan</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item">Master data</li>
                <li class="breadcrumb-item active">Kategori tulisan</li>
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
        <div class="card">
          <div class="card-body">
            <a href="/admin/masterdata/categories/create" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Buat kategori baru</a>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Kategori</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($categories as $category)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $category->name }}</td>
                      <td>                          
                          <a href="/admin/masterdata/categories/{{ $category->slug }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen"></i></a>
                          <form action="/admin/masterdata/categories/{{ $category->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Anda akan menghapus kategori ini?')"><i class="fa-solid fa-trash"></i></button>
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
@endsection