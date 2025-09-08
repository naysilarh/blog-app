@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Artikel</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">+ Tambah Artikel</a>

    @if($posts->count() > 0)
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="text-muted">{{ \Carbon\Carbon::parse($post->date)->format('d M Y') }}</p>
                            <p class="card-text">
                                {{ Str::limit($post->content, 150, '...') }}
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Belum ada artikel.</p>
    @endif
</div>
@endsection
