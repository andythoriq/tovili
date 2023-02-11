@extends('layouts.main', ['title' => 'Home'])
@section('content')
@if ($stocks->count() <= 0)
    <div class="alert alert-warning">stok belum tersedia</div>
@else
    <div class="row">
        @foreach ($stocks as $stock)
            <x-card>
                @slot('nama'){{ $stock->nama }}@endslot
                @slot('slug'){{ $stock->slug }}@endslot
                @slot('gambar'){{ $stock->gambar }}@endslot
                @slot('harga'){{ $stock->harga }}@endslot
                @slot('persediaan'){{ $stock->persediaan }}@endslot
            </x-card>
        @endforeach
    </div>
@endif
<div class="text-center">{{ $stocks->links() }}</div>
@endsection
@section('tombol')
    <div class="row">
        <a href="{{ route('cartIndex') }}" class="btn btn-outline-light col-6 col-lg-3 position-relative" type="button">
            @if ($productIdCount > 0)
                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">{{ $productIdCount }}</span>
            @endif
            <i class="fa-solid fa-cart-shopping fs-1 mt-2"></i>
            <p>keranjang belanjaan</p>
        </a>
        <a href="{{ route('cartHistory') }}" class="btn btn-outline-light col-6 col-lg-3" type="button"><i class="fa-solid fa-clock-rotate-left fs-1 mt-2"></i><p>riwayat pemesanan</p></a>
    </div>
@endsection
