<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
public function index(Request $request)
{
    $query = Post::with('user','category');

    // Author hanya melihat post sendiri
    if (auth()->check() && auth()->user()->role === 'author') {
        $query->where('user_id', auth()->id());
    }

    // Filter kategori
    if ($request->category_id) {
        $query->where('category_id', $request->category_id);
    }

    // Paginasi
    $posts = $query->latest()->paginate(10);

    // **Pastikan $categories didefinisikan di sini**
    $categories = Category::all();

    // Kirim ke view
    return view('posts.index', compact('posts','categories'));
}



    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
    'title' => 'required|string|max:255',
    'content' => 'required|string',
    'category_id' => 'required|exists:categories,id',
]);

Post::create([
    'title' => $validated['title'],
    'content' => $validated['content'],
    'category_id' => $validated['category_id'],
    'user_id' => auth()->id(),
    'date' => now(), // <-- otomatis pakai tanggal & waktu sekarang
]);


   
    // redirect balik ke posts.index
    return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
}


    public function edit(Post $post)
{
    $user = Auth::user();

    if ($user && $user->role === 'author' && $post->user_id !== $user->id) {
        abort(403, 'Unauthorized.');
    }

    $categories = Category::all();
    return view('posts.edit', compact('post', 'categories'));
}


    public function update(Request $request, Post $post)
{
    $user = Auth::user();
    if ($user && $user->role === 'author' && $post->user_id !== $user->id) {
        abort(403, 'Unauthorized.');
    }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'date' => 'required|date',
    ]);

    $post->update($validated);

    return redirect()->route('posts.index')->with('success', 'Post updated.');
}

public function show(Post $post)
{
    return view('posts.show', compact('post'));
}

    public function destroy(Post $post)
{
    $user = Auth::user();
    if ($user && $user->role === 'author' && $post->user_id !== $user->id) {
        abort(403, 'Unauthorized.');
    }

    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted.');
}

}
