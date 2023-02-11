<?php use App\Models\Stock;?>
@extends('layouts.main', ['title' => "Cart ($productIdCount)"])
@section('content')
<form action="{{ route('cartStore', $productIdentifier) }}" method="post" class="form-cart">
    @csrf
    <div class="alert alert-success">produk ini akan dikirim ke : {{ $alamat }}</div>
    <div class="table-responsive">
        <table class="table table-striped-columns">
            <tr class="table-success">
                <th>no.</th>
                <th>produk</th>
                <th>jumlah</th>
                <th>harga</th>
                <th>total</th>
                <th>ditambahkan pada</th>
                <th>hapus</th>
            </tr>
            @foreach ($products as $product)
            <?php $stock = Stock::where('id', $product->stock_id)->first() ?>
            <tr>
                <td class="table-success">{{ $loop->iteration }}</td>
                <td>{{ $stock->nama }}</td>
                <td>{{ $product->jumlah }}</td>
                <td>Rp {{ number_format($stock->harga, 0,',','.') }}</td>
                <td>Rp {{ number_format($product->jumlah * $stock->harga, 0,',','.') }}<span class="total invisible">{{ $product->jumlah * $stock->harga }}</span></td>
                <td>{{ $product->created_at->diffForHumans()  }}</td>
                <td><a href="{{ route('cartDestroy', $product->id) }}" class="form-cart btn btn-outline-warning" onclick="return confirm('apakah anda yakin ingin menghapus?')">Hapus</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="alert alert-success">Total Keseluruhan : Rp <span id="hasilTotal"></span></div>
    @if ($products->count() <= 0)
        <div class="position-absolute top-50 start-50 translate-middle"><div class="alert alert-warning">pesanan belum ditemukan !</div></div>
    @else
    <div class="row justify-content-between">
        <button type="submit" class="btn btn-success col-4" onclick="return confirm('semua pesanan akan segera dikirim. periksa terlebih dahulu untuk memastikan pesanan benar')">Pesan Sekarang</button><br>
        <a href="{{ route('metodeBayar') }}" class="btn btn-info col-4">Bayar Transfer / Qris</a>
    </div>
    <script src="{{ asset('js/hitungtotal.js') }}"></script>
    @endif
</form>
@endsection
@section('tombol')
    <div class="row">
        <a href="https://wa.link/wdg6im" target="_blank" class="btn btn-outline-light col-6 col-lg-3" type="button"><i class="fa-brands fa-square-whatsapp fs-1"></i><p class="mb-0">pesan melalui WhatsApp</p></a>
        <a href="{{ route('home') }}" class="btn btn-outline-light col-6 col-lg-3" type="button"><i class="fa-solid fa-shop fs-2"></i><p class="mb-0">ke beranda</p></a>
    </div>
@endsection
