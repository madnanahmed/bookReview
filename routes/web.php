<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/chatbot/query', [\App\Http\Controllers\ChatbotController::class, 'handle'])->name('chatbot.query');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $registrationData = \App\Models\User::selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return view('dashboard', compact('registrationData'));
    })->name('dashboard');

    Route::middleware('isAdmin')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        /*books*/
        Route::resource('books', BookController::class);
        Route::resource('books.reviews', ReviewController::class)->shallow();

        /*users*/
        Route::resource('users', \App\Http\Controllers\UserController::class);
    });
});

require __DIR__ . '/auth.php';
