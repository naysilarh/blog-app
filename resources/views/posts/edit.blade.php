<h1>Edit Post</h1>
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    Judul: <input type="text" name="title" value="{{ $post->title }}"><br>
    Konten:<br>
    <textarea name="content">{{ $post->content }}</textarea><br>
    <button type="submit">Update</button>
</form>
