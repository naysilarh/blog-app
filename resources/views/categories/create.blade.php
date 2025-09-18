@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kategori</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Nama --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name') }}"
                   required
                   class="mt-1 block w-full rounded-lg border-gray-300 bg-gray-100 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label for="desc" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="desc" id="desc" rows="4"
                      class="mt-1 block w-full rounded-lg border-gray-300 bg-gray-100 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500">{{ old('desc') }}</textarea>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('categories.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                Batal
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
