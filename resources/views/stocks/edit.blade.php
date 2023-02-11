@extends('layouts.main', ['title' => 'Stock'])
@section('content')
<form action="{{ route('stock.update', $stock->slug) }}" method="post" enctype="multipart/form-data">
    @csrf @method('put')
    <x-stockinput>
        @slot('nama'){{ $stock->nama }}@endslot
        @slot('persediaan'){{ $stock->persediaan }}@endslot
        @slot('deskripsi'){{ $stock->deskripsi }}@endslot
        @slot('harga'){{ $stock->harga }}@endslot
    </x-stockinput>
</form>
@endsection
