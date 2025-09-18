<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   public function index()
    {
       if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                $posts = Post::with('user','category')->get();
            } else {
                $posts = Post::with('user','category')
                    ->where('user_id', Auth::id())
                    ->get();
            }
        } else {
            $posts = Post::with('user','category')->get();
        }

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

   public function store(Request $request)
{
    // validasi input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ]);

    // simpan ke DB
    $post = new \App\Models\Post();
    $post->title = $validated['title'];
    $post->content = $validated['content'];
    $post->category_id = $validated['category_id'];
    $post->user_id = auth()->id(); // user yg login
    $post->save();

    // redirect balik ke posts.index
    return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
}


    public function edit(Post $post)
    {
        $user = Auth::user();
        if ($user->isAuthor() && $post->user_id !== $user->id) {
            abort(403, 'Unauthorized.');
        }

        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $user = Auth::user();
        if ($user->isAuthor() && $post->user_id !== $user->id) {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required',
            'date'        => 'required|date',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $user = Auth::user();
        if ($user->isAuthor() && $post->user_id !== $user->id) {
            abort(403, 'Unauthorized.');
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}
