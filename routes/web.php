<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
Route::get('/graph', [App\Http\Controllers\GraphController::class, 'index'])
    ->name('graph_index');
Route::get('/comments', [App\Http\Controllers\CommentsController::class, 'index'])
    ->name('comments_show');

Route::get('/comment/add', [App\Http\Controllers\CommentsController::class, 'add_form'])
    ->name('comment_add');

Route::post('/comment/add', [App\Http\Controllers\CommentsController::class, 'create'])
    ->name('comment_add');

