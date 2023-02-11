@extends('layouts.main', ['title' => 'Stock'])
@section('content')
<div class="row d-flex justify-content-center">
    <h2 class="display-6 text-center">contoh tampilan di beranda</h2>
    <x-card>
        @slot('nama'){{ $stock->nama }}@endslot
        @slot('slug'){{ $stock->slug }}@endslot
        @slot('gambar'){{ $stock->gambar }}@endslot
        @slot('harga'){{ $stock->harga }}@endslot
        @slot('persediaan'){{ $stock->persediaan }}@endslot
    </x-card>
</div>
    <hr>
    <h1 class="display-6">detail :</h1>
    <div class="responsive-table">
        <table class="table">
            <tr>
                <td>nama : </td>
                <td>{{ $stock->nama ?? '-'}}</td>
            </tr>
            <tr>
                <td>persediaan : </td>
                <td>{{ $stock->persediaan }}</td>
            </tr>
            <tr>
                <td>harga</td>
                <td>Rp {{ number_format($stock->harga, 2,',','.') }}</td>
            </tr>
            <tr>
                <td>deskripsi : </td>
                <td>{{ $stock->deskripsi ?? '-'}}</td>
            </tr>
            <tr>
                <td>dibuat pada : </td>
                <td>{{ $stock->created_at }} ({{ $stock->created_at->diffForHumans() }})</td>
            </tr>
            <tr>
                <td>diubah pada : </td>
                <td>{{ $stock->updated_at }}  ({{ $stock->updated_at->diffForHumans() }})</td>
            </tr>
        </table>
    </div>
@endsection
