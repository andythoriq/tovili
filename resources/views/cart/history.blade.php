<?php use App\Models\Stock;?>
@extends('layouts.main', ['title' => "History"])
@section('content')
<div class="table-responsive">
    <table class="table table-striped-columns">
        <tr class="table-secondary">
            <th>no.</th>
            <th>produk</th>
            <th>jumlah</th>
            <th>total</th>
            <th>dipesan pada</th>
            <th>telah diterima</th>
        </tr>
        @foreach ($products as $product)
        <?php $stock = Stock::where('id', $product->stock_id)->first() ?>
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $stock->nama }}</td>
            <td>{{ $product->jumlah }}</td>
            <td>Rp {{ number_format($product->jumlah * $stock->harga, 0,',','.') }}</td>
            <td>{{ $product->updated_at->diffForHumans() }}</td>
            <td>
                @if ($product->terKirim)
                    <i class="fa-solid fa-check"></i>
                @else
                    <i class="fa-solid fa-x"></i>
                @endif
        </tr>
        @endforeach
    </table>
</div>
@endsection
@section('tombol')
    <div class="row">
        <a href="https://wa.link/wdg6im" target="_blank" class="btn btn-outline-light col-6 col-lg-3" type="button"><i class="fa-brands fa-square-whatsapp fs-1"></i><p class="mb-0">pesan melalui WhatsApp</p></a>
        <a href="{{ route('home') }}" class="btn btn-outline-light col-6 col-lg-3" type="button"><i class="fa-solid fa-shop fs-2"></i><p class="mb-0">ke beranda</p></a>
    </div>
@endsection
