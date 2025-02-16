<?php

use App\Http\Controllers\AdminQuizController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ArticleDetailController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserQuizController;
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

Route::resource('articles', ArticleController::class)->only('show');
Route::resource('chat', ChatController::class);
Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/quiz', [UserQuizController::class, 'index'])->name('user.quiz.index');
    Route::get('/user/quiz/{categoryId}', [UserQuizController::class, 'show'])->name('user.quiz.show');
    Route::post('/user/quiz/submit', [UserQuizController::class, 'submit'])->name('user.quiz.submit');
    Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');

    Route::resource('articles', ArticleController::class)->except('show');

    Route::prefix('articles-detail')->group(function () {
        Route::get('/', [ArticleDetailController::class, 'index'])->name('articles.detail.index');
        Route::get('/{id}', [ArticleDetailController::class, 'show'])->name('articles.detail.show');
    });

    Route::get('/articles-submissions', [ArticleController::class, 'submissions'])->name('articles.submissions');

    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        // Manage Users
        Route::resource('users', UserController::class);

        // Article history and approve
        Route::get('/articles-history', [ArticleController::class, 'history'])->name('articles.history');
        Route::patch('/articles/{id}/approve', [ArticleController::class, 'approve'])->name('articles.approve');
        Route::patch('/articles/{id}/reject', [ArticleController::class, 'reject'])->name('articles.reject');

        // QUIZ Score
        Route::get('/scores', [ScoreController::class, 'indexAdmin'])->name('admin.quiz.scores');
        // QUIZ CRUD
        Route::get('/quiz', [AdminQuizController::class, 'index'])->name('admin.quiz.index');
        Route::get('/quiz/create', [AdminQuizController::class, 'create'])->name('admin.quiz.create');
        Route::post('/quiz', [AdminQuizController::class, 'store'])->name('admin.quiz.store');
        Route::get('/quiz/{quiz}/edit', [AdminQuizController::class, 'edit'])->name('admin.quiz.edit');
        Route::put('/quiz/{quiz}', [AdminQuizController::class, 'update'])->name('admin.quiz.update');
        Route::delete('/quiz/{quiz}', [AdminQuizController::class, 'destroy'])->name('admin.quiz.destroy');

        Route::get('/quiz/start/{category_id}', [AdminQuizController::class, 'startQuiz'])->name('quiz.start');

        Route::get('/quiz/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::get('/admin/categories/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::get('/admin/quiz/create/{category_id}', [AdminQuizController::class, 'create'])->name('admin.quiz.create');
        Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');


        Route::post('/quiz/categories/', [CategoryController::class, 'store'])->name('admin.categories.store');
    });
});

require __DIR__ . '/auth.php';
