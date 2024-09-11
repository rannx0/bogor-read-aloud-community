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

        // Mengambil 3 blog terbaru yang bukan blog ini
        $recentBlogs = BlogPost::where('id', '!=', $blog->id)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        return view('frontend.article.show', compact('blog', 'recentBlogs'));        
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
        
        // Konversi tags terkait dengan artikel menjadi string yang dipisahkan koma
        $selectedTags = $blog->tags->pluck('name')->implode(', ');
    
        return view('backend.article.edit', compact('blog', 'categories', 'tags', 'selectedTags'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        // Validasi data input
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi tambahan untuk gambar
            'description' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'tags' => 'nullable|string',
        ]);

        // Proses cover image jika di-upload
        if ($request->hasFile('cover_image')) {
            // Hapus gambar lama jika ada
            if ($blog->cover_image) {
                \Storage::delete('public/' . $blog->cover_image);
            }
            // Simpan gambar baru
            $data['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
        }

        // Update blog post dengan data baru
        $blog->update($data);

        // Proses dan sinkronisasi tag
        if ($request->filled('tags')) {
            // Ambil tag dari input, pecah dengan koma, dan trim spasi
            $tags = collect(explode(',', $request->input('tags')))->map(function ($tag) {
                // Cari atau buat tag baru
                return Tag::firstOrCreate(['name' => trim($tag)])->id;
            });

            // Sinkronkan tag dengan blog post
            $blog->tags()->sync($tags);
        }

        // Redirect dengan pesan sukses
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

