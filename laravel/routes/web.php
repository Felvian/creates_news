<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/{id}', [PostsController::class, 'show']);
// Показ формы редактирования
Route::get('/posts/{id}/edit', [PostsController::class, 'edit']);

// Обновление поста
Route::put('/posts/{id}', [PostsController::class, 'update']);
