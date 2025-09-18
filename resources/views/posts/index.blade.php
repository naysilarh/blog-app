@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    <!-- Filter Kategori -->
    <form method="GET" action="{{ route('posts.index') }}" class="mb-6 flex gap-2">
        <select name="category_id" class="border rounded px-2 py-1">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition shadow">
            Filter
        </button>
    </form>

    <!-- Tambah Post jika Admin atau Author -->
    @if(auth()->check() && in_array(auth()->user()->role, ['admin','author']))
        <a href="{{ route('posts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-6 inline-block hover:bg-green-600 transition shadow">
            + Add Post
        </a>
    @endif

    <!-- Card Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($posts as $post)
        <div class="bg-white border rounded-xl shadow-md p-4 flex flex-col hover:shadow-lg transition">
            <h2 class="text-lg font-semibold mb-2">{{ $post->title }}</h2>
            <p class="text-sm text-gray-600 mb-1">
                <span class="font-medium">Category:</span> {{ $post->category->name }}
            </p>
            <p class="text-sm text-gray-600 mb-4">
                <span class="font-medium">Author:</span> {{ $post->user->name }}
            </p>

            <div class="mt-auto flex flex-wrap gap-2">
                <!-- Tombol untuk Guest = "Baca Selengkapnya", kalau login tetap "View" -->
                <a href="{{ route('posts.show', $post->id) }}" 
                   class="border border-blue-500 text-blue-500 px-3 py-1 rounded hover:bg-blue-500 hover:text-white transition text-sm no-underline">
                   {{ auth()->check() ? 'View' : 'Baca Selengkapnya' }}
                </a>

                @if(auth()->check() && (auth()->user()->role == 'admin' || (auth()->user()->role == 'author' && auth()->id() == $post->user_id)))
                    <!-- Edit Button (Outline Yellow) -->
                    <a href="{{ route('posts.edit', $post->id) }}" 
                       class="border border-yellow-500 text-yellow-500 px-3 py-1 rounded hover:bg-yellow-500 hover:text-white transition text-sm no-underline">
                       Edit
                    </a>

                    <!-- Delete Button (Outline Red) -->
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="border border-red-500 text-red-500 px-3 py-1 rounded hover:bg-red-500 hover:text-white transition text-sm"
                                onclick="return confirm('Are you sure?')">
                                Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>
        @empty
        <p class="col-span-full text-center text-gray-500">No posts found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $posts->withQueryString()->links() }}
    </div>
</div>
@endsection
