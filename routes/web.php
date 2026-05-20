<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\SecureCommentController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CropAdviceController;
use App\Http\Controllers\WeatherAlertController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\MarketController;
use App\Services\AIService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


// =======================
// ADMIN ROUTES
// =======================
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/attack-logs', function () {
        return view('admin.attack-logs', [
            'logs' => \App\Models\AttackLog::latest()->get()
        ]);
    })->name('admin.attack.logs');

    Route::get('/admin/security-report', function () {
        return view('admin.security-report');
    })->name('admin.security.report');

    Route::get('/admin/users', [UserManagementController::class, 'index'])
        ->name('admin.users');

    Route::delete('/admin/users/{id}', [UserManagementController::class, 'destroy'])
        ->name('admin.users.delete');
});


// =======================
// STUDENT ROUTES
// =======================
Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');

    Route::get('/student/weather-standalone', function () {
        return view('student.weather-standalone');
    })->name('student.weather-standalone');

    Route::post('/student/weather/search', [WeatherController::class, 'search'])
        ->name('student.weather.search');

    Route::get('/student/crop-advice', function () {
        return view('student.crop-advice.form');
    })->name('student.crop.advice');

    Route::post('/student/crop-advice', [CropAdviceController::class, 'getAdvice'])
        ->name('student.crop.advice.post');
});


// =======================
// SECURITY / ATTACK ROUTES
// =======================
Route::middleware(['auth', 'role:student', 'attack.detect'])->group(function () {

    Route::get('/student/vulnerable', function () {
        return view('student.vulnerable-form');
    });

    Route::post('/student/comment', function (\Illuminate\Http\Request $request) {
        return back()->with('comment', $request->comment);
    });

    Route::get('/student/secure', [SecureCommentController::class, 'show']);
    Route::post('/student/secure-comment', [SecureCommentController::class, 'store']);
});


// =======================
// PROFILE ROUTES
// =======================
Route::middleware('auth')->group(function () {

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// =======================
// DEFAULT DASHBOARD
// =======================
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// =======================
// WEATHER ALERTS
// =======================
Route::get('/check-weather', [WeatherAlertController::class, 'checkWeather']);

Route::get('/student/alerts', [WeatherAlertController::class, 'showAlerts'])
    ->name('student.alerts');


// =======================
// AI ROUTES
// =======================
Route::get('/ai-test', function () {
    return view('test-ai');
});

Route::post('/ai-chat', [AIController::class, 'chat']);

Route::post('/ai-advice', [AIController::class, 'autoAdvice']);

Route::post('/crop-advice', [AIController::class, 'cropAdvice']);

Route::post('/test-ai', [AIController::class, 'store'])
    ->name('test.ai');


// =======================
// MARKET ROUTES
// =======================
Route::get('/market', [MarketController::class, 'index'])
    ->middleware('auth');


// =======================
// AUTH ROUTES
// =======================
require __DIR__ . '/auth.php';
