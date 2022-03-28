<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;

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