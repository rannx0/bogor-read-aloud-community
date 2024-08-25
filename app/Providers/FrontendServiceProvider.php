<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Event;
use App\Models\MediaPartner;
use App\Models\Sponsor;

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
        // View Composer untuk view 'frontend.home'
        View::composer('welcome', function ($view) {
            // Ambil data yang dibutuhkan
            $galleries = Gallery::all();
            $sliders = Slider::all();
            $teams = Team::all();
            $events = Event::all();

            // Kirimkan data ke view
            $view->with(compact('sliders', 'galleries', 'teams' , 'events'));
        });

        // View Composer untuk view 'frontend.events.show'
        View::composer('pages.events', function ($view) {
            $eventId = request()->route('event');
            $event = Event::with(['mediaPartners', 'sponsors'])->find($eventId);

            // Kirimkan data ke view
            $view->with('event', $event);
        });
    }
}
