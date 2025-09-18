@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 
                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                   placeholder="Masukkan judul post" required>
        </div>

        <!-- Konten -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten</label>
            <textarea name="content" id="content" rows="5" required
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 
                             focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                      placeholder="Tulis konten post di sini...">{{ $post->content }}</textarea>
        </div>

        <!-- Tanggal -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Post</label>
            <input type="date" name="date" id="date"
                   value="{{ old('date', $post->date ?? date('Y-m-d')) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 
                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                   required>
        </div>

        <!-- Kategori -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="category_id" id="category_id" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex gap-3">
            <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                Update
            </button>
            <a href="{{ route('posts.index') }}" 
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg shadow hover:bg-gray-400 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
