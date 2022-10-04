@extends('layouts.nonavbar')

@section('container')
    <section class="register d-flex">
        <div class="register-left h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="form-container">
                    <div class="header mb-4">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-sm rounded-pill btn-outline-primary">&#8592;</button>
                          </form>                        
                        <h1 class="h3 fw-bold mt-3">Verifikasi</h1>
                        <p>Hi {{ auth()->user()->name }}!, selamat datang kembali di Omalov</p>
                    </div>
        
                    <div class="form-verification">
                        <div class="card text-bg-light mb-3" style="min-width: 18rem;">
                            <div class="card-body text-center">
                              <p class="card-text">Data anda sudah diajukan, silahkan tunggu 1x24 Jam untuk direview.</p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="register-right bg-primary">

        </div>
    </section>
@endsection