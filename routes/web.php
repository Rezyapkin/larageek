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

use App\Http\Controllers\NewsController as NewsController;
use App\Http\Controllers\CategoriesController as CategoriesController;


Route::get('/', function () {
    return view('index');
});


Route::get('/news', [NewsController::class, 'index'])->name('newsList');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('newsOne')->where('id', '\d+');

Route::get('/news/category/{id}', [NewsController::class, 'showByCategory'])->name('showByCategory')->where('id', '\d+');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categoriesList');
