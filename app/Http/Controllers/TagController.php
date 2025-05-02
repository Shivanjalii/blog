<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    // Display all tags
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('tags.index', compact('tags'));
    }

    // Show the form to create a new tag
    public function create()
    {
        return view('tags.create');
    }

    // Store a new tag
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:tags,title',
        ]);

        Tag::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    // Show a single tag (optional)
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    // Show the form to edit a tag
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    // Update a tag
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:tags,title,' . $tag->id,
        ]);

        $tag->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    // Delete a tag
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted.');
    }
}

