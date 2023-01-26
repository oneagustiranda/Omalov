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
                <table class="datatable table table-sm table-stripped table-hover table-center mb-0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Year of Birth</th>
                      <th scope="col">Verification</th>
                      <th scope="col" class="text-center">Is Active</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $user->name }}</td>                          
                          
                          @if($userIdentity = $userIdentities->where('user_id', $user->id)->first())
                            <td>{{ $userIdentity->year_birth }}</td>
                            <td>Data Filled</td>
                          @else
                            <td> - </td>
                            <td>Not Filled</td>
                          @endif

                          @if($user->is_active)
                            <td class="text-center">
                              <span class="badge badge-pill bg-success">ACTIVE</span>
                            </td>
                          @else
                            <td class="text-center">
                              <span class="badge badge-pill bg-warning">INACTIVE</span>
                            </td>
                          @endif
                          
                          <td><i class="fa-solid fa-ellipsis-vertical"></i></td>

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