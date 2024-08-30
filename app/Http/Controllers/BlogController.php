<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogPost::with('category', 'tags')->get();
        return view('backend.article.index', compact('blogs'));
    }

    public function showDetail($title)
    {
        $title = urldecode($title); // Jika perlu mendecode URL
        $blog = BlogPost::where('title', $title)->firstOrFail();
        return view('frontend.article.show', compact('blog'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();
        return view('backend.article.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'cover_image' => 'nullable|image',
            'description' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id', // Tabel kategori disesuaikan
            'tags' => 'nullable|string',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
        }

        $blog = BlogPost::create($data);

        if ($request->filled('tags')) {
            $tags = collect(explode(',', $request->input('tags')))->map(function ($tag) {
                return Tag::firstOrCreate(['name' => trim($tag)])->id;
            });

            $blog->tags()->sync($tags);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil ditambahkan!');
    }

    public function show(BlogPost $blog)
    {
        return view('backend.article.show', compact('blog'));
    }

    public function edit(BlogPost $blog)
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();
        return view('backend.article.edit', compact('blog', 'categories', 'tags'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'cover_image' => 'nullable|image',
            'description' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id', // Tabel kategori disesuaikan
            'tags' => 'nullable|string',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($blog->cover_image) {
                \Storage::delete('public/' . $blog->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
        }

        $blog->update($data);

        if ($request->filled('tags')) {
            $tags = collect(explode(',', $request->input('tags')))->map(function ($tag) {
                return Tag::firstOrCreate(['name' => trim($tag)])->id;
            });

            $blog->tags()->sync($tags);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui!');
    }

    public function destroy(BlogPost $blog)
    {
        if ($blog->cover_image) {
            \Storage::delete('public/' . $blog->cover_image);
        }
        $blog->tags()->detach();
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus!');
    }
}

