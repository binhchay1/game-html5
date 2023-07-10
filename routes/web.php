<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
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
    return view('page.user.layout.homepage');
});

Route::get('/get-link', [GameController::class, 'getLinksGame']);
Route::group(['prefix' => 'games'], function () {
    Route::get('/{name}', [GameController::class, 'viewGame']);
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/errors/{errors}', [AdminController::class, 'errors'])->name('errors');
Auth::routes();

Route::middleware(['check.auth', 'admin'])->group(
    function () {
        Route::get('/admin',[AdminController::class, 'index'])->name('admin');
        Route::get('/list-user',[UserController::class, 'index'])->name('user.index');
        Route::get('/list-game',[\App\Http\Controllers\Admin\GameController::class, 'index'])->name('game.index');
        Route::get('/list-category',[\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
    }
);
