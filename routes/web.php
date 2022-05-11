<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
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
            Route::post('change-status-carousel-image', [CarouselController::class, 'changeStatus'])->name('admin.carousel.change.status');
            Route::post('delete-carousel-image', [CarouselController::class, 'delete'])->name('admin.carousel.delete');
        });

        // Blog
        Route::prefix('blog')->group(function () {
            Route::get('', [BlogController::class, 'index'])->name('admin.blog.index');
            Route::get('ceate', [BlogController::class, 'create'])->name('admin.blog.create');
            Route::post('post', [BlogController::class, 'post'])->name('admin.blog.post');
            Route::get('edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
            Route::post('update', [BlogController::class, 'update'])->name('admin.blog.update');
            Route::post('delete', [BlogController::class, 'delete'])->name('admin.blog.delete');

            Route::prefix('category')->group(function () {
                Route::get('', [BlogCategoryController::class, 'index'])->name('admin.blog.category.index');
                Route::post('get-category', [BlogCategoryController::class, 'getCategory'])->name('admin.blog.category.get');
                Route::post('ceate', [BlogCategoryController::class, 'create'])->name('admin.blog.category.create');
                Route::post('update', [BlogCategoryController::class, 'update'])->name('admin.blog.category.update');
                Route::post('change-status', [BlogCategoryController::class, 'changeStatus'])->name('admin.blog.category.change.status');
            });
        });

        // Logout
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
