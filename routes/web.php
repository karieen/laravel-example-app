<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;


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

Route::get('/', [RecipeController::class, 'index']);

Route::get('/hello', [PageController::class, 'index']);

Route::controller(RecipeController::class)->group(function () {
    Route::prefix('recipe')->group(function () {
        Route::get('/', 'index')->name('recipe.index');
        Route::get('/create', 'create');
        Route::post('/create', 'store')->name('recipe.create');
        Route::get('/show/{recipe}', 'show')->name('recipe.show');
        Route::get('/edit/{recipe}', 'edit')->name('recipe.edit');
        Route::post('/edit/{recipe}', 'update');
        Route::get('/delete/{recipe}', 'destroy')->name('recipe.delete');
    });
});

Route::controller(CommentController::class)->group(function () {
    Route::prefix('comments')->group(function () {
        Route::post('/store', 'store')->name('comments.store');
    });
});
