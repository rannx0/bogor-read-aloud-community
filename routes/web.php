<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\MediaPartnerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes (Frontend)
Route::get('/', [FrontendController::class, 'index'])->name('welcome');
Route::get('/events/{judul}', [EventController::class, 'showDetail'])->name('detail.events');

// Authentication Routes
Auth::routes();

// Routes requiring authentication (Backend)
Route::middleware(['auth'])->group(function () {
    Route::get('/backend', function () {
        return view('backend.home');
    })->name('backend.home');

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Slider
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
    Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('/sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::get('/gallery/{id}/show', [GalleryController::class, 'index'])->name('galleries.show');
    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    // Team 
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
    Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');

    // Events
    Route::get('/events', [EventController::class, 'index'])->name('events.index'); // View event list
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // Display event creation form
    Route::post('/events', [EventController::class, 'store'])->name('events.store'); // Store new event data
    Route::get('/events/show/{event}', [EventController::class, 'show'])->name('events.show'); // View event details
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit'); // Display event edit form
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update'); // Save event data changes
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy'); // Delete event

    // Media Partners
    Route::post('/media-partners', [MediaPartnerController::class, 'store'])->name('mediaPartners.store'); // Store a media partner
    Route::delete('/media-partners/{mediaPartner}', [MediaPartnerController::class, 'destroy'])->name('mediaPartners.destroy'); // Delete a media partner

    // Sponsors
    Route::post('/sponsors', [SponsorController::class, 'store'])->name('sponsors.store'); // Store a sponsor
    Route::delete('/sponsors/{sponsor}', [SponsorController::class, 'destroy'])->name('sponsors.destroy'); // Delete a sponsor
    
    // Routes untuk Blog Posts
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // Melihat daftar blog posts
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create'); // Menampilkan form pembuatan blog post
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store'); // Menyimpan blog post baru
    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show'); // Melihat detail blog post
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit'); // Menampilkan form edit blog post
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update'); // Menyimpan perubahan data blog post
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy'); // Menghapus blog post

    // Route untuk mencari blog berdasarkan kategori atau tag
    Route::get('/blogs/category/{category}', [BlogController::class, 'category'])->name('blogs.category'); // Melihat daftar blog berdasarkan kategori
    Route::get('/blogs/tag/{tag}', [BlogController::class, 'tag'])->name('blogs.tag'); // Melihat daftar blog berdasarkan tag

    // Routes untuk Categories
    Route::get('/categories', [BlogCategoryController::class, 'index'])->name('categories.index'); // Menampilkan daftar kategori
    Route::get('/categories/create', [BlogCategoryController::class, 'create'])->name('categories.create'); // Menampilkan form pembuatan kategori
    Route::post('/categories', [BlogCategoryController::class, 'store'])->name('categories.store'); // Menyimpan kategori baru
    Route::get('/categories/{category}', [BlogCategoryController::class, 'show'])->name('categories.show'); // Menampilkan detail kategori
    Route::get('/categories/{category}/edit', [BlogCategoryController::class, 'edit'])->name('categories.edit'); // Menampilkan form edit kategori
    Route::put('/categories/{category}', [BlogCategoryController::class, 'update'])->name('categories.update'); // Menyimpan perubahan kategori
    Route::delete('/blog-categories/{blogCategory}', [BlogCategoryController::class, 'destroy'])->name('categories.destroy');    // Menghapus kategori

});


