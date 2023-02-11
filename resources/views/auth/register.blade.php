@extends('layouts.main', ['title' => 'Register'])
@section('content')
<form action="{{ route('crateRegister') }}" method="post" class="form-register">
    <div class="row justify-content-center">
        <div class="card col-lg-6 col-11">
            <div class="card-body">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="nama" class="form-control @error('nama')
                        is-invalid
                    @enderror" id="a" placeholder="nama" value="{{ old('nama') }}">
                    <label for="a">Nama</label>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="alamat" class="form-control @error('alamat')
                        is-invalid
                    @enderror" id="c" placeholder="alamat" value="{{ old('alamat') }}">
                    <label for="c">Alamat VBI 5 <small class="text-secondary">untuk pengiriman</small></label>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('email')
                        is-invalid
                    @enderror" id="q" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="q">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password')
                        is-invalid
                    @enderror" id="w" placeholder="Password">
                    <label for="w">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <p class="text-secondary mt-4 mb-0">sudah memiliki akun? klik <a href="{{ route('login') }}">link ini untuk login!</a></p>

                <button type="submit" class="btn btn-outline-success mt-4 py-2 px-3 fs-3 tombol-daftar">Daftar !</button>
            </div>
        </div>
    </div>
</form>
@endsection
