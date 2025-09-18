<h1>Buat Post Baru</h1>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    Judul: <input type="text" name="title"><br>
    Konten:<br>
    <textarea name="content"></textarea><br>
    <button type="submit">Simpan</button>
</form>
