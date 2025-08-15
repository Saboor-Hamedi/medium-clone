<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(middleware: ['auth', 'verified'])
    ->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    // Post middleware 
    Route::middleware(['post', 'auth', 'verified'])->group(function(){
        // Posts
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    // Do not allow some routes to be accessed via GET request.
    Route::get('/posts/store', function () {
    return redirect()->route('posts.create');
    });
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    // Show post
    Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/posts/{post:slug}/show', [PostController::class, 'show'])->name('posts.show');
    Route::put('/posts/{post:slug}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy');
    });
});


require __DIR__.'/auth.php';
