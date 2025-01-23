<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CompanyAboutController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\CompanyStatisticController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/team', [FrontController::class, 'team'])->name('front.team');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('front.appointment');
Route::post('/appointment/store', [FrontController::class, 'appointment_store'])->name('front.appointment_store');
Route::get('/ppdb', [FrontController::class, 'ppdb'])->name('front.ppdb');
Route::get('/book', [FrontController::class, 'book'])->name('front.book');
Route::get('/blog', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('blog/{slug}', [BlogController::class, 'show'])->name('front.blog');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('admin')-> name('admin.')->group(function(){

        Route::middleware('can:manage statistics')->group(function(){
            Route::resource('statistics', CompanyStatisticController::class);
        });
        Route::middleware('can:manage product')->group(function(){
            Route::resource('products', ProductController::class);
        });
        Route::middleware('can:manage principles')->group(function(){
            Route::resource('principles', OurPrincipleController::class);
        });
        Route::middleware('can:manage testimonials')->group(function(){
            Route::resource('testimonials', TestimonialController::class);
        });
        Route::middleware('can:manage clients')->group(function(){
            Route::resource('clients', ProjectClientController::class);
        });
        Route::middleware('can:manage teams')->group(function(){
            Route::resource('teams', OurTeamController::class);
        });
        Route::middleware('can:manage abouts')->group(function(){
            Route::resource('abouts', CompanyAboutController::class);
        });
        Route::middleware('can:manage appointments')->group(function(){
            Route::resource('appointments', AppointmentController::class);
        });
        Route::middleware('can:manage hero sections')->group(function(){
            Route::resource('hero_sections', HeroSectionController::class);
        });
        Route::middleware('can:manage blogs')->group(function(){
            Route::resource('blogs', BlogController::class);
        });
        Route::middleware('can:manage ppdb')->group(function(){
            Route::resource('ppdb', PpdbController::class);
        });
        Route::middleware('can:manage classModels')->group(function(){
            Route::resource('classModels', ClassModelController::class);
        });
        Route::middleware('can:manage books')->group(function(){
            Route::resource('books', BookController::class);
        });
        Route::middleware('can:manage categories')->group(function(){
            Route::resource('categories', CategoryController::class);
        });
        Route::middleware('can:manage activities')->group(function(){
            Route::resource('activities', ActivityController::class);
        });

    });
});

require __DIR__.'/auth.php';
