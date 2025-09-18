@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $category->name }}</h1>

    <p class="text-gray-700 whitespace-pre-line mb-6">
        {{ $category->desc ?? 'Tidak ada deskripsi.' }}
    </p>

    <div class="flex justify-end space-x-3">
        <a href="{{ route('categories.index') }}"
           class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
            Kembali
        </a>
        <a href="{{ route('categories.edit', $category) }}"
           class="px-4 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">
            Edit
        </a>
    </div>
</div>
@endsection
