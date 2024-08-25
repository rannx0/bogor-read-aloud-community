<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('backend.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('backend.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/team_images');

        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team member added successfully.');
    }

    public function edit(Team $team)
    {
        return view('backend.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($team->image_path);
            $imagePath = $request->file('image')->store('public/team_images');
        } else {
            $imagePath = $team->image_path;
        }

        $team->update([
            'name' => $request->name,
            'position' => $request->position,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(Team $team)
    {
        Storage::disk('public')->delete($team->image_path);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team member deleted successfully.');
    }

}
