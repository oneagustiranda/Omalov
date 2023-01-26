@extends('admin.layouts.main')

@section('container')
    
    <div class="row">
        <!-- isi konten web -->
        <form class="row justify-content-between" method="post" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PATCH')

            <div class="page-header">
                <div class="row d-flex align-items-center mt-5">
                    <div class="col-auto">
                        <h3 class="page-title mt-3">{{ $user->name }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Pengguna</li>
                            <li class="breadcrumb-item">Pengguna terdaftar</li>
                            <li class="breadcrumb-item active">{{ $user->name }}</li>
                        </ul>
                    </div>
                    <div class="col-auto ms-auto">
                        <div class="row d-flex align-items-center p-2">
                            <div class="form-check form-switch col-auto">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ $user->is_active == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Activate the user account</label>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card col-sm-5 m-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" disabled>
                    </div>
                </div>
            </div>

            <div class="card col-sm-6 m-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="marital_status">Marital Status</label>
                        <input type="text" class="form-control" id="marital_status" name="marital_status" value="{{ $maritalStatuses->name ?? '-' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="year_birth">Year of birth</label>
                        <input type="text" class="form-control" id="year_birth" name="year_birth" value="{{ $userIdentities->first()->year_birth ?? '-' }}" disabled>
                    </div>

                    <fieldset class="border p-3">
                    <legend class="float-none w-auto fs-6">Address</legend>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $userIdentities->first()->city ?? '-' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" id="province" name="province" value="{{ $userIdentities->first()->province ?? '-' }}" disabled>
                    </div>
                    </fieldset>
                </div>
            </div>
        </form>
         
        <!-- akhir isi konten web -->
    </div>
@endsection