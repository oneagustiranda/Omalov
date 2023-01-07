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
      <!-- isi konten web -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card card-table">
            <div class="card-body booking_card">
              <div class="table-responsive">
                <table class="table table-sm table-stripped table-hover table-center mb-0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Year of birth</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Is Active</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($user_identities as $user_identity)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $user_identity->user->name }}</td>
                          <td>{{ $user_identity->year_birth }}</td>
                          <td>{{ $user_identity->gender }}</td>
                          <td>{{ $user_identity->user->is_active }}</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- akhir isi konten web -->
    </div>

@endsection