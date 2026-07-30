<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/settings', function () {
    return view('settings');
})->middleware('auth')->name('settings');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::view('/chat', 'chat')->name('chat');

    Route::view('/resources', 'resources')->name('resources');

    Route::view('/chat-history', 'chat-history')->name('chat.history');

    Route::view('/student-profile', 'profile')->name('student.profile');

    Route::view('/faculty', 'faculty')->name('faculty');

    
      Route::view('/notifications', 'notifications')->name('notifications');

       Route::view('/help', 'help')->name('help');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
