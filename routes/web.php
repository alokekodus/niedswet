<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CarouselController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [HomeController::class, 'index'])->name('site.home');
Route::get('about-niedswet', [HomeController::class, 'aboutUs'])->name('site.about');
Route::get('our-team', [HomeController::class, 'ourTeam'])->name('site.about.team');
Route::get('events', [HomeController::class, 'events'])->name('site.events');
Route::get('gallery/images', [HomeController::class, 'galleryImage'])->name('site.gallery.image');
Route::get('blogs/{id?}', [HomeController::class, 'blogs'])->name('site.blogs');
Route::post('contact', [HomeController::class, 'contactForm'])->name('site.contact');


Route::prefix('admin')->group(function () {
    
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('admin.login');
    

        // Authenticated routes
        Route::middleware(['auth'])->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.index');

            // Carousel
            Route::prefix('carousel')->group(function () {
                Route::get('', [CarouselController::class, 'index'])->name('admin.carousel.index');
                Route::post('upload-carousel-image', [CarouselController::class, 'upload'])->name('admin.carousel.upload');
                Route::post('update-carousel-image', [CarouselController::class, 'update'])->name('admin.carousel.update');
                Route::post('delete-carousel-image', [CarouselController::class, 'delete'])->name('admin.carousel.delete');
            });

            // Logout
            Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
        });
});