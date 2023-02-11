<?php use App\Models\User;?>
@extends('layouts.main', ['title' => "Pesanan"])
@section('content')
    @if ($products->count() <= 0)
        <div class="alert alert-warning rounded-0">pemesanan tidak tersedia</div>
    @else
    <div class="table-responsive">
        <table class="table table-striped-columns">
            <tr class="table-info">
                <th>no.</th>
                <th>nama</th>
                <th>detail</th>
            </tr>
            @foreach ($products as $product)
            <?php $getNama = User::where('id', $product->user_id)->first('nama')->nama;?>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $getNama }}</td>
                <td><a href="{{ route('pesananDetail', $product->user_id) }}" class="btn btn-outline-info">info pesannan</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
@endsection
