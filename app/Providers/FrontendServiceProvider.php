<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\Configuration;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // View Composer untuk view 'welcome'
        View::composer('welcome', function ($view) {
            // Ambil data yang dibutuhkan
            $galleries = Gallery::all();
            $sliders = Slider::all();
            $teams = Team::all();
            $events = Event::all();
            $blogs = BlogPost::with('category')->latest()->get();
            $configurations = Configuration::first();
            $eventId = request()->route('event');
            $event = $eventId ? Event::with(['mediaPartners', 'sponsors'])->find($eventId) : null;

            // Kirimkan data ke view
            $view->with(compact('sliders', 'galleries', 'teams', 'events', 'blogs', 'event', 'configurations'));
        });

        // View Composer untuk semua view
        View::composer('*', function ($view) {
            $configurations = Configuration::first();
            $view->with('config', $configurations);
        });
    }
}
