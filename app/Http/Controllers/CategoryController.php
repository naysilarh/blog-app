<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'desc' => 'nullable|string',
    ]);

    Category::create($request->only('name', 'desc'));

    return redirect()->route('categories.index')->with('success', 'Category berhasil ditambahkan!');
}


    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

   public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'desc' => 'nullable|string',
    ]);

    $category->update($request->only('name', 'desc'));

    return redirect()->route('categories.index')->with('success', 'Category berhasil diperbarui!');
}

public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category berhasil dihapus!');
    }
}
