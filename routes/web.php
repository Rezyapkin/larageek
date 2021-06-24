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

Route::get('/', function () {
    return "<h1>Приветствую учеников Geekbrains</h1><ul><li><a href='news'>Новости</a></li></ul>";
});

Route::get('/news', function () {
    $page = "<h1>Новости</h1><ul>";
    for ($i = 1; $i <= 10; $i++) {
        $page.= "<li><a href='/news/${i}'>Новость ${i}</a></li>";
    }
    
    return $page . '</ul>';
});

Route::get('/news/{id}', function (string $id) {
    return "<h1>Новость ${id}</h1><a href='/news'>К списку новостей</a>";
});