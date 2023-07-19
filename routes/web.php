<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
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
Route::get('/cookie-policy', [HomeController::class, 'viewCookiePolicy'])->name('cookie-policy');
Route::get('/search', [HomeController::class, 'viewSearch'])->name('search');
Route::get('/tags/{tag}', [HomeController::class, 'viewTags'])->name('tags');
Route::get('/category/{category}', [HomeController::class, 'viewCategory'])->name('category');
Route::get('/tags', [HomeController::class, 'viewListTags'])->name('listTags');
Route::get('/category', [HomeController::class, 'viewListCategory'])->name('listCategory');
Route::get('/new-games', [HomeController::class, 'viewNewGames'])->name('new-games');
Route::get('/best-games', [HomeController::class, 'viewBestGame'])->name('best-games');
Route::get('/privacy', [HomeController::class, 'viewPrivacy'])->name('privacy');
Route::get('/games/{game}', [HomeController::class, 'viewGame'])->name('playGames');

Auth::routes();

Route::middleware(['check.auth', 'admin'])->group(
    function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');

        //User
        Route::get('/list-user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/{id}', [UserController::class, 'showUser'])->name('user.showUser');
        Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
        Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('user.editUser');
        Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('user.updateUser');

        Route::get('/list-game', [GameController::class, 'index'])->name('game.index');
        Route::get('/list-category', [CategoryController::class, 'index'])->name('category.index');
    }
);

Route::middleware('check.auth')->group(
    function () {
        Route::get('/user-info', [ProfileController::class, 'show'])->name('user.show');
        Route::get('/user-profile', [ProfileController::class, 'edit'])->name('user.edit');
        Route::post('/user-profile', [ProfileController::class, 'update'])->name('user.update');
        Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
        Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('update-password');
        Route::get('/user-logout', [ProfileController::class, 'logout'])->name('user.logout');
        Route::get('/vote-by-user', [GameController::class, 'voteByUser'])->name('vote-by-user');
    }
);
