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
    return view('questions.index');
});
Route::get('/perguntas', function () {
    return view('questions.index');
})->name('questions.index');
Route::get('/dimensoes', function () {
    return view('questions.index');
})->name('dimensions.index');
