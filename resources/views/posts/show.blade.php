@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-6">
    <!-- Judul -->
    <h1 class="text-3xl font-bold mb-3 text-gray-800">{{ $post->title }}</h1>

    <!-- Info Post -->
    <p class="text-sm text-gray-500 mb-6">
        <span class="font-medium">Kategori:</span> {{ $post->category->name }} |
        <span class="font-medium">Penulis:</span> {{ $post->user->name }} |
        <span class="font-medium">Tanggal:</span> {{ $post->date }}
    </p>

    <!-- Konten -->
    <div class="prose max-w-none text-gray-700 leading-relaxed">
        {!! nl2br(e($post->content)) !!}
    </div>

    <!-- Tombol kembali -->
    <div class="mt-6">
        <a href="{{ route('posts.index') }}" 
           class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded-lg shadow hover:bg-gray-300 transition">
            ← Kembali
        </a>
    </div>
</div>
@endsection
