@extends('admin.layouts.main')

@section('container')
<div class="col-sm-12 mt-5">
    <a href="/admin/users" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
</div>

<form class="row justify-content-between col-sm-12" method="post" action="{{ route('admin.users.update', $user->id) }}">
    @csrf
    @method('PATCH')

    <div class="page-header">
        <div class="row d-flex align-items-center mt-4">
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
                        <label class="form-check-label" for="is_active">Aktifkan akun pengguna</label>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card col-sm-5 m-2">
        <div class="card-body">
            <div class="form-group">
                <label for="email" class="form-label">Alamat email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ substr($user->email, 0, 1) . str_repeat("*", strpos($user->email, '@') - 2) . substr($user->email, strpos($user->email, '@') - 1, 1) . substr($user->email, strpos($user->email, '@')) }}" disabled>
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Nama pengguna</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ substr($user->username, 0, 3) . str_repeat("*", strlen($user->username) - 5) . substr($user->username, -2) }}" disabled>
            </div>
        </div>
    </div>

    <div class="card col-sm-6 m-2">
        <div class="card-body">
            <div class="form-group">
                <label for="marital_status">Status pernikahan</label>
                <input type="text" class="form-control" id="marital_status" name="marital_status" value="{{ $maritalStatuses->name ?? '-' }}" disabled>
            </div>
            <div class="form-group">
                <label for="year_birth">Tahun kelahiran</label>
                <input type="text" class="form-control" id="year_birth" name="year_birth" value="{{ $userIdentities->first()->year_birth ?? '-' }}" disabled>
            </div>

            <fieldset class="border p-3">
            <legend class="float-none w-auto fs-6">Alamat</legend>
            <div class="form-group">
                <label for="city">Kota/Kabupaten</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $userIdentities->first()->city ?? '-' }}" disabled>
            </div>
            <div class="form-group">
                <label for="province">Provinsi</label>
                <input type="text" class="form-control" id="province" name="province" value="{{ $userIdentities->first()->province ?? '-' }}" disabled>
            </div>
            </fieldset>
        </div>
    </div>
</form>
@endsection