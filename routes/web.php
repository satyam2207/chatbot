<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ChatAnalyticsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNoticeController;
use App\Http\Controllers\AdminDepartmentController;
use App\Http\Controllers\AdminFacultyController;
use App\Http\Controllers\SettingsController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/settings', function () {
    return view('settings', [
        'user' => auth()->user(),
    ]);
})->middleware('auth')->name('settings');

Route::patch('/settings', [SettingsController::class, 'update'])
    ->middleware('auth')
    ->name('settings.update');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {


   Route::middleware('admin')->group(function () {


    Route::resource('admin/faculty', AdminFacultyController::class)
    ->except(['show'])
    ->names([
        'index' => 'admin.faculty',
        'create' => 'admin.faculty.create',
        'store' => 'admin.faculty.store',
        'edit' => 'admin.faculty.edit',
        'update' => 'admin.faculty.update',
        'destroy' => 'admin.faculty.destroy',
    ]);

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');

        Route::middleware('admin')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('admin/notices', AdminNoticeController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.notices',
            'create' => 'admin.notices.create',
            'store' => 'admin.notices.store',
            'edit' => 'admin.notices.edit',
            'update' => 'admin.notices.update',
            'destroy' => 'admin.notices.destroy',
        ]);

    // ADD DEPARTMENT ROUTES HERE
    Route::resource('admin/departments', AdminDepartmentController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.departments',
            'create' => 'admin.departments.create',
            'store' => 'admin.departments.store',
            'edit' => 'admin.departments.edit',
            'update' => 'admin.departments.update',
            'destroy' => 'admin.departments.destroy',
        ]);

});

    Route::resource('admin/notices', AdminNoticeController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.notices',
            'create' => 'admin.notices.create',
            'store' => 'admin.notices.store',
            'edit' => 'admin.notices.edit',
            'update' => 'admin.notices.update',
            'destroy' => 'admin.notices.destroy',
        ]);
});

    Route::get('/chat-analytics', [ChatAnalyticsController::class, 'index'])
    ->name('chat.analytics');
Route::get('/documents', [DocumentController::class, 'index'])
    ->name('documents.index');

Route::get('/documents/create', [DocumentController::class, 'create'])
    ->name('documents.create');

Route::post('/documents', [DocumentController::class, 'store'])
    ->name('documents.store');

Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])
    ->name('documents.destroy');
    


    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('/chat/new', [ChatController::class, 'store'])->name('chat.new');
    Route::post('/chat', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::delete('/chat/{chatSession}', [ChatController::class, 'destroy'])->name('chat.delete');

    Route::get('/departments', function () {
    $departments = \App\Models\Department::where('is_active', true)
        ->withCount('faculties')
        ->get();

       

    return view('departments', compact('departments'));
})->name('departments');

Route::get('/courses', function () {
    $courses = \App\Models\Course::where('is_active', true)
        ->with('department')
        ->get();

    return view('courses', compact('courses'));
})->name('courses');

    Route::view('/resources', 'resources')->name('resources');
    Route::get('/notices', [\App\Http\Controllers\NoticeController::class, 'index'])
    ->name('notices');

    Route::get('/chat-history', [ChatController::class, 'index'])->name('chat.history');
    Route::patch('/chat/{chatSession}/pin', [ChatController::class, 'togglePin'])->name('chat.pin');

    Route::patch('/chat/{chatSession}/archive', [ChatController::class, 'toggleArchive'])->name('chat.archive');

    Route::view('/student-profile', 'profile')->name('student.profile');

    Route::get('/faculty', function () {
    $faculties = \App\Models\Faculty::with('department')
        ->where('is_active', true)
        ->get();

    return view('faculty', compact('faculties'));
})->name('faculty');

    
      Route::get('/notifications', function () {
    $notifications = \App\Models\Notice::where('is_active', true)
        ->latest('notice_date')
        ->get();

    return view('notifications', compact('notifications'));
})->name('notifications');

       Route::view('/help', 'help')->name('help');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
