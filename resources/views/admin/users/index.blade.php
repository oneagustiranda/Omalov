@extends('admin.layouts.main')

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
              <table class="datatable table table-sm table-stripped table-hover table-center mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Tahun Kelahiran</th>
                    <th scope="col">Verifikasi</th>
                    <th scope="col" class="text-center">Status Akun</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>                          
                        
                        @if($userIdentity = $userIdentities->where('user_id', $user->id)->first())
                          <td>{{ $userIdentity->year_birth }}</td>
                          <td>
                            <a href="/admin/users/{{ $user->id }}/edit">
                              Data Lengkap &#8599;
                            </a>
                          </td>
                        @else
                          <td> - </td>
                          <td>Belum mengisi data</td>
                        @endif

                        @if($user->is_active)
                          <td class="text-center">
                            <span class="badge badge-pill bg-success">AKTIF</span>                              
                          </td>
                        @else
                          <td class="text-center">
                            <span class="badge badge-pill bg-warning">BELUM AKTIF</span>
                          </td>
                        @endif                          

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