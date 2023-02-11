@extends('layouts.main', ['title' => 'User'])
@section('content')
<p><b>Nama : </b>{{ $user->nama }}</p>
<p><b>Alamat : </b>{{ $user->alamat }}</p>
<p><b>Email : </b>{{ $user->email }}</p>
<p><b>Akun ini dibuat pada : </b> {{ $user->created_at->diffForHumans() }}</p>
@endsection
@if (auth()->user()->getAuthIdentifier() === $user->id)
    @section('tombol')
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin logout?')">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>
    @endsection
@endif
