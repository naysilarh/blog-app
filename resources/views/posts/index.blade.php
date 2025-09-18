@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Post</h1>

    @auth
        @if(auth()->user()->role === 'author' || auth()->user()->role === 'admin')
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ Tambah Post</a>
        @endif
    @endauth

    @if($posts->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name ?? '-' }}</td>
                        <td>{{ $post->user->name ?? '-' }}</td>
                        <td>{{ $post->date }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Lihat</a>

                            @auth
                                @if(auth()->user()->role === 'admin' || auth()->id() === $post->user_id)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                                    </form>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada post.</p>
    @endif
</div>
@endsection
