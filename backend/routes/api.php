<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('chat', ChatController::class);

Route::post('/consultations', [ConsultationController::class, 'store']);
