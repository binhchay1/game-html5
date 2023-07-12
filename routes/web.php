<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GameController;
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

Route::get('/', [HomeController::class, 'viewHome'])->name('home');
Route::get('/get-link', [GameController::class, 'getLinksGame']);
Route::get('/cookie-policy', [HomeController::class, 'viewCookiePolicy'])->name('policy');

Route::get('/category/{category}', [HomeController::class, 'viewCategory'])->name('category');;

Route::group(['prefix' => 'games'], function () {
    Route::get('/{name}', [GameController::class, 'viewGame']);
});

Route::get('/admin', [AdminController::class, 'index']);
Auth::routes();

Route::middleware(['check.auth', 'admin'])->group(
    function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/list-user', [UserController::class, 'index'])->name('user.index');
        Route::get('/list-game', [GameController::class, 'index'])->name('game.index');
        Route::get('/list-category', [CategoryController::class, 'index'])->name('category.index');
    }
);
