<h1>Daftar Post</h1>
<a href="{{ route('posts.create') }}">+ Tambah Post</a>
<ul>
    @foreach($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            | <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>
