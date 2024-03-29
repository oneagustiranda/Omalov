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
                        <p>Hi {{ auth()->user()->name }}!, kami ingin memastikan anda orang sebenarnya</p>
                    </div>
        
                    <div class="form-verification">
                        <form method="POST" action="/verification">
                            @csrf
                            <div class="form-floating">
                                <input type="text" name="year_birth" class="form-control @error('year_birth') is-invalid @enderror" id="year_birth" placeholder="06/18/1985" pattern="[0-9]{4}" required value="{{ old('year_birth') }}">
                                <label for="year_birth">Tahun lahir (yyyy)</label>
                                @error('year_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">                            
                                <select name="gender" class="form-select">
                                    <option value="Laki-laki" selected>Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select> 
                                <label for="gender">Jenis kelamin</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="province" class="form-control @error('province') is-invalid @enderror" id="province" placeholder="Jl. Ahmad Yani No. 8" required value="{{ old('province') }}">
                                <label for="province">Provinsi</label>
                                @error('province')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Jl. Ahmad Yani No. 8" required value="{{ old('city') }}">
                                <label for="city">Kota/Kabupaten</label>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <select class="form-select" name="marital_status_id">
                                  @foreach ($marital_statuses as $category)
                                    @if(old('category_id') == $category->id)
                                      <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                  @endforeach            
                                </select>
                                <label for="marital_status" class="form-label">Status perkawinan</label>
                            </div>
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="" id="termsCondition" onclick="btnEnable()">
                                <label class="form-check-label" for="termsCondition">
                                  Saya menyetujui <a href="/persyaratan-pengguna">persyaratan</a> dan <a href="/kebijakan-aplikasi">kebijakan</a>
                                </label>
                            </div>

                            <button class="w-100 btn rounded-pill btn-primary mt-4" id="submit" type="submit" disabled>Ajukan Data</button>       
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="register-right bg-primary">

        </div>
    </section>
@endsection


<script>
    function btnEnable(){
        const submitButton = document.getElementById("submit");
        const checkTerms = document.getElementById("termsCondition");

        if (checkTerms.checked) {
            submitButton.removeAttribute("disabled");
        }
        else{
            submitButton.disabled = "true";
        }
    }
</script>