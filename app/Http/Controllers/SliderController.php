<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.sliders.index', compact('sliders'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('backend.sliders.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'files.*' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validate multiple files
        ]);

        // Store each file
        if($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $imagePath = $file->store('sliders', 'public');

                // Create new slider record for each file
                Slider::create([
                    'image_path' => $imagePath,
                ]);
            }
        }

        // Return success response
        return redirect()->route('sliders.index')->with('success', 'Slider created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit', compact('slider'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Slider $slider)
    {
        // Validate request
        $request->validate([
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Check if a new file was uploaded
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($slider->image_path);

            // Store new file
            $imagePath = $request->file('file')->store('sliders', 'public');
            $slider->image_path = $imagePath;
        }

        // Save updated slider
        $slider->save();

        // Redirect with success message
        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Slider $slider)
    {
        // Delete the slider's image
        Storage::disk('public')->delete($slider->image_path);
        
        // Delete the slider record
        $slider->delete();

        // Redirect with success message
        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully.');
    }

    // Display sliders on the welcome page
    public function welcome()
    {
        $sliders = Slider::all();
        return view('welcome', compact('sliders'));
    }
}
