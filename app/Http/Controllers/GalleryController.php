<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('backend.galleries.index', compact('galleries'));
    }

    public function showAll()
    {
        $galleries = Gallery::all();
        return view('welcome', compact('galleries'));
    }

    public function create()
    {
        return view('backend.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.*' => 'required|string|max:255',
            'image.*' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $titles = $request->input('title');
        $images = $request->file('image');

        foreach ($titles as $index => $title) {
            // Buat entitas galeri untuk setiap judul dan gambar
            $gallery = Gallery::create([
                'title' => $title,
                'image_path' => $images[$index]->store('public/images'),
            ]);
        }

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil dibuat.');
    }

    public function show(Gallery $gallery)
    {
        return view('backend.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('backend.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($gallery->image_path);

            // Upload new image
            $imagePath = $request->file('image')->store('images', 'public');
            $gallery->update([
                'title' => $request->title,
                'image_path' => $imagePath,
            ]);
        } else {
            $gallery->update([
                'title' => $request->title,
            ]);
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }

}


