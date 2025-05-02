<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Display a list of categories
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:categories,title',
        ]);

        Category::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show a single category (optional)
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form to edit a category
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update a category
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:categories,title,' . $category->id,
        ]);

        $category->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->posts()->detach(); // If using many-to-many relationship
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted.');
    }
}

