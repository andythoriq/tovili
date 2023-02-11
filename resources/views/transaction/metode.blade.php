@extends('layouts.main', ['title' => "Pilih Metode"])
@section('content')
<h1 class="display-6">metode pembayaran</h1>
    <div class="text-center">
        <img loading="lazy" src="{{ asset('./img/lewattransfer.png') }}" alt="gambar-penjelasan-transfer" width=90% height=50%>
        <hr>
        <img loading="lazy" src="{{ asset('./img/lewatqris.png') }}" alt="gambar-barcode-qris" width=70% height=50%>
    </div>
@endsection
@section('tombol')
    <a href="{{ route('home') }}" class="btn btn-outline-warning"><i class="fa-solid fa-shop fs-2"></i> kembali ke home</a>
@endsection
