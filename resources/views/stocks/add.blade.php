@extends('layouts.main', ['title' => 'Stock'])
@section('content')
<form action="{{ route('stock.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <x-stockinput></x-stockinput>
</form>
@endsection
