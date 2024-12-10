<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UpvoteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('feature',FeatureController::class);

    Route::post('feature/{feature}/upvote',[UpvoteController::class ,'store'])->name('upvote.store');
    Route::delete('upvote/{feature}',[UpvoteController::class,'destroy'])->name('upvote.destroy');
    Route::post('feature/{feature}/comment',[CommentController::class,'store'])->name('comment.store');
   Route::delete('comment/{feature}',[CommentController::class,'destroy'])->name('comment.destroy');

});

require __DIR__.'/auth.php';
