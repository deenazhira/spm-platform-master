<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReflectionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentSubjectController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('mainpage');
});

Route::get('/reflection', function () {
    return view('reflection');
});

// Route for subject index view (list all subjects)
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');

// Route for subject creation form
Route::get('/add-subject', [SubjectController::class, 'create'])->name('add.subject');

// Route for handling subject form submission
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');

// Other routes related to reflections
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('reflections', ReflectionController::class);
    Route::get('/reflection', [ReflectionController::class, 'index'])->name('reflection.index');
    Route::delete('/reflection/{reflection}', [ReflectionController::class, 'destroy'])->name('reflection.destroy');
});

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login', [RegisterController::class, 'login']);

// Logout Route
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');

// Routes for student subjects
Route::post('/student/add-subject/{subject}', [StudentSubjectController::class, 'addSubject'])->name('student.subject.add');

// Profile related routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/user/profile-information', [ProfileController::class, 'updateProfileInformation'])->name('user-profile-information.update');
    Route::post('/user/password', [ProfileController::class, 'updatePassword'])->name('user-password.update');
    Route::post('/user/two-factor-authentication', [ProfileController::class, 'enableTwoFactorAuthentication'])->name('user-two-factor-authentication.enable');
    Route::delete('/user/two-factor-authentication', [ProfileController::class, 'disableTwoFactorAuthentication'])->name('user-two-factor-authentication.disable');
    Route::post('/user/confirm-two-factor-authentication', [ProfileController::class, 'confirmTwoFactorAuthentication'])->name('user-two-factor-authentication.confirm');
    Route::post('/user/logout-other-browser-sessions', [ProfileController::class, 'logoutOtherBrowserSessions'])->name('user-browser-sessions.logout');
    Route::delete('/user', [ProfileController::class, 'deleteUser'])->name('user.delete');
});
