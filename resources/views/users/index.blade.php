@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Daftar Users</h2>
    <a href="{{ route('users.create') }}" 
       class="inline-block bg-blue-600 text-white px-4 py-2 rounded mb-4 hover:bg-blue-700">
       + Tambah User
    </a>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border text-left w-12">No</th>
                    <th class="px-4 py-2 border text-left">Nama</th>
                    <th class="px-4 py-2 border text-left">Email</th>
                    <th class="px-4 py-2 border text-left w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border flex items-center gap-2">
                        {{ $user->name }}
                        @if($user->role === 'admin')
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded">Admin</span>
                        @elseif($user->role === 'author')
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded">Author</span>
                        @else
                            <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded">Guest</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('users.show', $user->id) }}" 
                           class="text-blue-600 hover:underline mr-2">Detail</a>
                        <a href="{{ route('users.edit', $user->id) }}" 
                           class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 text-center text-gray-500">Belum ada user</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
