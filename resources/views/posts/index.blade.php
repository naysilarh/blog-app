{{-- resources/views/posts/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold">Daftar Post</h1>
        <a href="{{ url('/posts/create') }}" class="btn btn-primary">+ Tambah Post</a>
    </div>

    @if($posts->count())
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($post->content, 100) }}</p>
                            <small class="text-secondary">{{ $post->date }}</small>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ url('/posts/'.$post->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ url('/posts/'.$post->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">Belum ada post tersedia.</div>
    @endif
</div>
@endsection