@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Kategori</h1>
        <a href="{{ route('categories.create') }}"
           class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            + Tambah Kategori
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $category->id }}</td>
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $category->name }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('categories.show', $category) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                Detail
                            </a>
                            <a href="{{ route('categories.edit', $category) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin hapus kategori ini?')"
                                        class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                            Belum ada kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
