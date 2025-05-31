<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::delete('/admin/quiz/{id}', [AdminController::class, 'deleteQuiz'])->name('admin.quiz.delete');
Route::patch('/admin/user/{id}/role', [AdminController::class, 'changeRole'])->name('admin.user.role');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
});

Route::get('/admin/quiz/create', [AdminController::class, 'createQuiz'])->name('admin.quiz.create');
Route::post('/admin/quiz/store', [AdminController::class, 'storeQuiz'])->name('admin.quiz.store');
