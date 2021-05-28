<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DimensionController;

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

Route::get('/', function() {
    return redirect('/dimensions');
});

// Dimensions
Route::get('/dimensions/search', [DimensionController::class, 'search']);
Route::resource('dimensions', DimensionController::class);
