<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConsultationController;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('chat', ChatController::class);

Route::post('/consultations', [ConsultationController::class, 'store']);
Route::get('/categories', function () {
    // Assuming you have a Category model that retrieves all categories
    return Category::all();
});

Route::get('/article', [ArticleController::class, 'indexApi']);
