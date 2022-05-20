<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\OurWorkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Web\NewsletterController;

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
Route::post('get-member-details', [HomeController::class, 'getMemberDetails'])->name('site.get.member.detail');
Route::get('our-work/{id?}', [HomeController::class, 'ourWork'])->name('site.ourwork');
Route::get('events', [HomeController::class, 'events'])->name('site.events');
Route::get('gallery/album/{id?}', [HomeController::class, 'albums'])->name('site.gallery.album');
Route::get('gallery/photos', [HomeController::class, 'galleryImage'])->name('site.gallery.image');
Route::get('gallery/videos', [HomeController::class, 'galleryVideos'])->name('site.gallery.video');
Route::get('blogs/{id?}', [HomeController::class, 'blogs'])->name('site.blogs');
Route::post('contact', [HomeController::class, 'contactForm'])->name('site.contact');
Route::post('subscribe-to-newsletter', [NewsletterController::class, 'submitNewsletter'])->name('site.subscribe.newsletter');


Route::get('privacy-policy', [HomeController::class, 'privacy'])->name('site.privacy');
Route::get('terms-and-conditions', [HomeController::class, 'terms'])->name('site.terms');


Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('update-password', [AuthController::class, 'updatePassword'])->name('admin.password.update');

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

        // Members
        Route::prefix('members')->group(function () {
            Route::match(['get', 'post'], 'add', [MemberController::class, 'addMember'])->name('admin.member.add');
            Route::get('edit/{category}/{id}', [MemberController::class, 'editMember'])->name('admin.member.edit');
            Route::post('update', [MemberController::class, 'updateMember'])->name('admin.member.update');
            Route::post('delete', [MemberController::class, 'deleteMember'])->name('admin.member.delete');

            Route::get('trustee', [MemberController::class, 'trustee'])->name('admin.trustee');
            Route::get('advisor', [MemberController::class, 'advisor'])->name('admin.advisor');
            Route::get('chartered-accountant', [MemberController::class, 'ca'])->name('admin.ca');
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

        // Gallery
        Route::prefix('gallery')->group(function () {
            Route::get('album', [GalleryController::class, 'album'])->name('admin.gallery.album');
            Route::post('create-album', [GalleryController::class, 'createAlbum'])->name('admin.create.album');
            Route::post('update-album', [GalleryController::class, 'updateAlbum'])->name('admin.update.album');
            Route::post('delete-album', [GalleryController::class, 'deleteAlbum'])->name('admin.delete.album');
            Route::get('album/{id}', [GalleryController::class, 'photos'])->name('admin.gallery.photos');
            Route::post('photos/upload', [GalleryController::class, 'upload'])->name('admin.gallery.upload');
            Route::post('photos/delete', [GalleryController::class, 'delete'])->name('admin.gallery.delete');
            Route::post('change-status-album', [GalleryController::class, 'changeAlbumStatus'])->name('admin.album.change.status');

            Route::get('videos', [GalleryController::class, 'video'])->name('admin.gallery.video.index');
            Route::post('videos/upload', [GalleryController::class, 'addVideo'])->name('admin.gallery.video.add');
            Route::post('videos/update', [GalleryController::class, 'updateVideo'])->name('admin.gallery.video.update');
            Route::post('videos/delete', [GalleryController::class, 'deleteVideo'])->name('admin.gallery.video.delete');
        });

        // Our work
        Route::prefix('our-work')->group(function () {
            Route::get('', [OurWorkController::class, 'index'])->name('admin.ourwork.index');
            Route::get('create', [OurWorkController::class, 'create'])->name('admin.ourwork.create');
            Route::post('post', [OurWorkController::class, 'post'])->name('admin.ourwork.post');
            Route::get('edit/{id}', [OurWorkController::class, 'edit'])->name('admin.ourwork.edit');
            Route::post('update', [OurWorkController::class, 'update'])->name('admin.ourwork.update');
            Route::post('delete', [OurWorkController::class, 'delete'])->name('admin.ourwork.delete');
        });

        // Testimonial
        Route::prefix('testimonial')->group(function () {
            Route::get('', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
            Route::post('add', [TestimonialController::class, 'add'])->name('admin.testimonial.add');
            Route::post('get-data', [TestimonialController::class, 'getData'])->name('admin.testimonial.getdata');
            Route::post('update', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
            Route::post('delete', [TestimonialController::class, 'delete'])->name('admin.testimonial.delete');
        });

        // Logout
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
