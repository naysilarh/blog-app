@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail User</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nama:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>No HP:</strong> {{ $user->no_hp ?? '-' }}</li>
        <li class="list-group-item"><strong>Alamat:</strong> {{ $user->alamat ?? '-' }}</li>
    </ul>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
