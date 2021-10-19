<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'returnIndex']);
// Route::get('/', [IndexController::class, 'returnIndex']);

// All categories Route
Route::get('/AllCategories', [CatController::class, 'geatAllCats']);

// Show specific Category
Route::get('/AllCategories/{id}', [CatController::class, 'getCatById']);

// Create a new categories
Route::get('create/category', [CatController::class, 'createCategory']);
// Push ne category to DB
Route::post('save/category', [CatController::class, 'pushCat']);

// Edit Category
Route::get('edit/category/page/{id}', [CatController::class, 'editPage']);
Route::post('edit/category/{id}', [CatController::class, 'submitEdit']);

// Delete Category
Route::delete('dlete/category/{id}', [CatController::class, 'deleteCat']);

// Search Category
Route::get('search/category', [CatController::class, 'search']);