<?php use App\Models\Stock;?>
@extends('layouts.main', ['title' => "Pesanan $user->nama"])
@section('content')
<h1 class="display-6">Pemesan : {{ $user->nama }}</h1>
<h1 class="display-6">Alamat Pengiriman : {{ $user->alamat }}</h1>
<hr>
<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th>produk</th>
            <th>jumlah</th>
            <th>harga</th>
            <th>total</th>
        </tr>
        @foreach ($products as $product)
        <?php $stock = Stock::where('id', $product->stock_id)->first(['nama', 'harga']);?>
        <tr>
            <td>{{ $stock->nama }}</td>
            <td>{{ $product->jumlah }}</td>
            <td>Rp {{ number_format($stock->harga, 0,',','.') }}</td>
            <td>Rp {{ number_format($product->jumlah * $stock->harga, 0,',','.') }}</td>
            <span class="total invisible">{{ $product->jumlah * $stock->harga }}</span>
        </tr>
        @endforeach
    </table>
    <div class="alert alert-success">Total Keseluruhan : Rp <span id="hasilTotal"></span></div>
    <form action="{{ route('kirimPesanan', $productIdentifier) }}" method="post">
        @csrf
        <p class="text-bg-warning form-cart ps-1 fs-4">apakah produk sudah terkirim ke alamat tujuan? jika sudah maka konfirmasi dengan meng-click tombol di bawah</p>
        <button type="submit" class="btn btn-outline-info mb-3">konfirmasi</button>
    </form>
</div>
<script src="{{ asset('js/hitungtotal.js') }}"></script>
@endsection
