@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Detail User</h1>

    <div class="space-y-3">
        <div>
            <span class="font-semibold text-gray-700">Nama:</span>
            <span class="text-gray-900">{{ $user->name }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Email:</span>
            <span class="text-gray-900">{{ $user->email }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Role:</span>
            @if($user->role === 'admin')
                <span class="px-2 py-1 bg-red-100 text-red-700 rounded-md text-sm">Admin</span>
            @elseif($user->role === 'author')
                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-sm">Author</span>
            @else
                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-sm">Guest</span>
            @endif
        </div>

        <div>
            <span class="font-semibold text-gray-700">Dibuat pada:</span>
            <span class="text-gray-900">{{ $user->created_at->format('d M Y H:i') }}</span>
        </div>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('users.index') }}"
           class="inline-block px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition">
            ← Kembali ke daftar
        </a>

        <a href="{{ route('users.edit', $user->id) }}"
           class="inline-block px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
            ✏️ Edit
        </a>
    </div>
</div>
@endsection
