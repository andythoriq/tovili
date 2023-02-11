@extends('layouts.main', ['title' => "Beli $stock->nama"])
@section('content')
<form action="{{ route('transactionStore', $stock->slug) }}" method="post" class="px-4">
    @csrf
    <div class="row row-beli">
        <div class="col-lg-5 col-12 mb-3">
            <span class="fs-4">Produk</span>
            <input type="text" class="form-control-lg form-control" id="q" value="{{ $stock->nama }}" readonly>
        </div>
        <div class="col-lg-5 col-12 mb-3">
            <span class="fs-4">Jumlah</span>
            <input name="jumlah" type="number" class="form-control-lg form-control @error('jumlah')
                is-invalid
            @enderror" id="w" value="{{ old('jumlah') }}" autofocus>
            @error('jumlah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-lg-2 col-12">
            <span class="fs-4">tambah</span>
            <button type="submit" class="btn btn-outline-success d-block p-4"><i class="fa-solid fa-cart-plus fs-1"></i></button>
        </div>
    </div>
</form>
@endsection
@section('tombol')
    <a href="{{ route('home') }}" class="btn btn-outline-warning"><i class="fa-solid fa-shop fs-2"></i> kembali ke home</a>
@endsection
