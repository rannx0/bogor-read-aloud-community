<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\Slider;
use App\Models\Event;
use App\Models\Team;
use App\Models\BlogPost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $galleries = gallery::count(); // Ganti dengan model dan metode sesuai
        $sliders = Slider::count(); // Ganti dengan model dan metode sesuai
        $events = Event::count(); // Ganti dengan model dan metode sesuai
        $teams = Team::count(); // Ganti dengan model dan metode sesuai
        $blogs = BlogPost::count(); // Ganti dengan model dan metode sesuai
    
        return view('backend.home', compact(
            'galleries',
            'sliders',
            'events',
            'teams',
            'blogs'
        ));
    }
}
