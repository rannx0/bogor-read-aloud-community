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
use App\Http\Controllers\ConfigurationController;

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
Route::get('/article/{title}', [BlogController::class, 'showDetail'])->name('detail.blogs');

// Authentication Routes
Auth::routes();

// Routes requiring authentication (Backend)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('backend.home');
    })->name('backend');

    // Slider Routes
    Route::prefix('/admin/sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('/{slider}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
    });

    // Gallery Routes
    Route::prefix('/admin/gallery')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('galleries.index');
        Route::get('/create', [GalleryController::class, 'create'])->name('galleries.create');
        Route::post('/', [GalleryController::class, 'store'])->name('galleries.store');
        Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
        Route::get('/{id}/show', [GalleryController::class, 'index'])->name('galleries.show');
        Route::put('/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
        Route::delete('/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
    });

    // Team Routes
    Route::prefix('/admin/teams')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('teams.index');
        Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
        Route::post('/', [TeamController::class, 'store'])->name('teams.store');
        Route::get('/{team}', [TeamController::class, 'show'])->name('teams.show');
        Route::get('/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
        Route::put('/{team}', [TeamController::class, 'update'])->name('teams.update');
        Route::delete('/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
    });

    // Event Routes
    Route::prefix('/admin/events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::get('/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/', [EventController::class, 'store'])->name('events.store');
        Route::get('/show/{event}', [EventController::class, 'show'])->name('events.show');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    });

    // Media Partners Routes
    Route::prefix('/admin/media-partners')->group(function () {
        Route::post('/', [MediaPartnerController::class, 'store'])->name('mediaPartners.store');
        Route::delete('/{mediaPartner}', [MediaPartnerController::class, 'destroy'])->name('mediaPartners.destroy');
    });

    // Sponsors Routes
    Route::prefix('/admin/sponsors')->group(function () {
        Route::post('/', [SponsorController::class, 'store'])->name('sponsors.store');
        Route::delete('/{sponsor}', [SponsorController::class, 'destroy'])->name('sponsors.destroy');
    });

    // Blog Routes
    Route::prefix('/admin/blogs')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/{blog}', [BlogController::class, 'show'])->name('blogs.show');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        Route::get('/category/{category}', [BlogController::class, 'category'])->name('blogs.category');
        Route::get('/tag/{tag}', [BlogController::class, 'tag'])->name('blogs.tag');
    });

    // Category Routes
    Route::prefix('/admin/categories')->group(function () {
        Route::get('/', [BlogCategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [BlogCategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [BlogCategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}', [BlogCategoryController::class, 'show'])->name('categories.show');
        Route::get('/{category}/edit', [BlogCategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}', [BlogCategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category}', [BlogCategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // Configuration Routes
    Route::get('/admin/configuration/{id?}', [ConfigurationController::class, 'index'])->name('configuration.index');
    Route::post('/admin/configuration', [ConfigurationController::class, 'store'])->name('configuration.store');
});
