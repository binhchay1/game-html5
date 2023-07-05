<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.homepage');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/get-link', [GameController::class, 'getLinksGame']);
Route::group(['prefix'=>'games'], function(){
    Route::get('/{name}', [GameController::class, 'viewGame']);
});

