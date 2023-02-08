@extends('admin.layouts.main')

@section('additional-css')
  <link rel="stylesheet" href="/css/dataTables.bootstrap5.min.css">
@endsection

@section('container')
  <div class="page-header">
    <div class="row">
        <div class="col-sm-12 mt-5">
            <h3 class="page-title mt-3">Pengguna terdaftar</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">Pengguna</li>
                <li class="breadcrumb-item active">Pengguna terdaftar</li>
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
            <table id="datatables" class="table table-sm table-stripped table-hover table-center mb-0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Tahun Kelahiran (yyyy)</th>
                  <th scope="col">Verifikasi</th>
                  <th scope="col" class="text-center">Status Akun</th>
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
        ajax: "{{ route('admin.users.list') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'name', name: 'name'},
          {data: 'year_birth', name: 'year_birth'},
          {data: 'action', name: 'action'},
          {data: 'is_active', name: 'is_active'},
        ]
      });
      
    });
  </script>
@endsection