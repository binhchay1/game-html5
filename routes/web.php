<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
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
    return view('page.user.layout.master-page');
});

Route::get('/get-link', [GameController::class, 'getLinksGame']);
Route::group(['prefix' => 'games'], function () {
    Route::get('/{name}', [GameController::class, 'viewGame']);
});

Route::get('/admin', [AdminController::class, 'index']);
Auth::routes();

Route::middleware('check.auth')->group(
    function () {
        Route::get('/admin',[AdminController::class, 'index'])->name('admin');
        Route::get('/list-user',[UserController::class, 'index'])->name('user.index');
        Route::get('/list-game',[\App\Http\Controllers\Admin\GameController::class, 'index'])->name('game.index');
        Route::get('/list-category',[\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
    }
);

Route::get('/home', [HomeController::class, 'index'])->name('home');
