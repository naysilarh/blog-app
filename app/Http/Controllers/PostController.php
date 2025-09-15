<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Tampilkan semua post
     */
    public function index()
    {
        // ambil semua post dengan relasi user
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Form create
     */
    public function create()
    {
        $users = User::all(); // buat dropdown penulis
        return view('posts.create', compact('users'));
    }

    /**
     * Simpan post baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        Post::create([
            'title'   => $request->title,
            'content' => $request->content,
            'date'    => now(),
            'user_id' => $request->user_id,
            'caty_id' => null, // nanti diisi setelah kategori jadi
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat');
    }

    /**
     * Detail post
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Form edit post
     */
    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    /**
     * Update post
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui');
    }

    /**
     * Hapus post
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus');
    }
}
