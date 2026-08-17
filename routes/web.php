<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DocumentController;


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


Route::get('/documents', [DocumentController::class, 'index'])
    ->name('documents.index');

Route::get('/documents/create', [DocumentController::class, 'create'])
    ->name('documents.create');

Route::post('/documents', [DocumentController::class, 'store'])
    ->name('documents.store');

Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])
    ->name('documents.destroy');
    


    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('/chat', [ChatController::class, 'sendMessage'])->name('chat.send');

    Route::view('/departments', 'departments')->name('departments');

    Route::view('/resources', 'resources')->name('resources');

    Route::get('/chat-history', [ChatController::class, 'index'])->name('chat.history');

    Route::view('/student-profile', 'profile')->name('student.profile');

    Route::view('/faculty', 'faculty')->name('faculty');

    
      Route::view('/notifications', 'notifications')->name('notifications');

       Route::view('/help', 'help')->name('help');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
