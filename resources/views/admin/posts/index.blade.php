@extends('admin.layouts.main')

@section('additional-css')
  <link rel="stylesheet" href="/css/dataTables.bootstrap5.min.css">
@endsection

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
        <div class="card">
          <div class="card-body card-table">
            <div class="table-responsive">
              <a href="/admin/posts/create" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Buat tulisan baru</a>
              <table id="datatables" class="table table-sm table-stripped table-hover table-center mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('additional-js')
  <script src="/js/jquery.dataTables.min.js"></script>
  <script src="/js/dataTables.bootstrap5.min.js"></script>

  <script type="text/javascript">
    $(function () {
      
      $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.posts.list') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'title', name: 'title'},
          {data: 'category_name', name: 'category_name'},
          {data: 'action', name: 'action'},
        ]
      });
      
    });
  </script>
@endsection