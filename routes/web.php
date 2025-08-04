<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(middleware: ['auth', 'verified'])
    ->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    // Posts 
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts/create', [PostController::class, 'create'])->name('posts.create');
});

require __DIR__.'/auth.php';
