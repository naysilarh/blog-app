@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Tambah User</h2>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Nama --}}
        <div>
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" name="name"
                class="w-full px-3 py-2 rounded-lg bg-gray-100 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white transition"
                required>
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email"
                class="w-full px-3 py-2 rounded-lg bg-gray-100 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white transition"
                required>
        </div>

        {{-- Password --}}
        <div>
            <label class="block font-medium mb-1">Password</label>
            <input type="password" name="password"
                class="w-full px-3 py-2 rounded-lg bg-gray-100 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white transition"
                required>
        </div>

        {{-- Role --}}
        <div>
            <label class="block font-medium mb-1">Role</label>
            <select name="role"
                class="w-full px-3 py-2 rounded-lg bg-gray-100 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white transition"
                required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="author">Author</option>
                <option value="guest">Guest</option>
            </select>
        </div>

        <div class="flex justify-end space-x-2 pt-4">
            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">Batal</a>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">Simpan</button>
        </div>
    </form>
</div>
@endsection
