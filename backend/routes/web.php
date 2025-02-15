<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/quiz', [QuizController::class, 'index'])->name('pages.quiz.index');
    Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');

    Route::resource('articles', ArticleController::class);

    Route::prefix('articles-detail')->group(function () {
        Route::get('/', [ArticleDetailController::class, 'index'])->name('articles.detail.index');
        Route::get('/{id}', [ArticleDetailController::class, 'show'])->name('articles.detail.show');
    });

    Route::get('/articles-submissions', [ArticleController::class, 'submissions'])->name('articles.submissions');

    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        // users
        Route::resource('users', UserController::class);

        Route::get('/articles-history', [ArticleController::class, 'history'])->name('articles.history');

        Route::patch('/articles/{id}/approve', [ArticleController::class, 'approve'])->name('articles.approve');
        Route::patch('/articles/{id}/reject', [ArticleController::class, 'reject'])->name('articles.reject');

        Route::get('/scores', [ScoreController::class, 'indexAdmin'])->name('admin.scores');
    });
});



require __DIR__ . '/auth.php';
