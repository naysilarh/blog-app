@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}"
                class="w-full px-3 py-2 rounded-lg bg-gray-100 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white transition"
                required>
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                class="w-full px-3 py-2 rounded-lg bg-gray-100 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white transition"
                required>
        </div>

        {{-- Password (opsional) --}}
        <div>
            <label class="block font-medium mb-1">Password (kosongkan jika tidak ingin ganti)</label>
            <input type="password" name="password"
                class="w-full px-3 py-2 rounded-lg bg-gray-100 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white transition">
        </div>

        {{-- Role --}}
        <div>
            <label class="block font-medium mb-1">Role</label>
            <select name="role"
                class="w-full px-3 py-2 rounded-lg bg-gray-100 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white transition"
                required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
                <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
            </select>
        </div>

        <div class="flex justify-end space-x-2 pt-4">
            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">Batal</a>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">Update</button>
        </div>
    </form>
</div>
@endsection
