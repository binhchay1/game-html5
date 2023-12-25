<?php

use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\ReportBugController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::middleware(['verified'])->group(function () {
    Route::get('/', [HomeController::class, 'viewHome'])->name('home');
    Route::get('/cookie-policy', [HomeController::class, 'viewCookiePolicy'])->name('cookie.policy');
    Route::post('/search', [HomeController::class, 'viewSearch'])->name('search');
    Route::get('/tags/{tag}', [HomeController::class, 'viewTags'])->name('tags');
    Route::get('/category/{category}', [HomeController::class, 'viewCategory'])->name('category');
    Route::get('/tags', [HomeController::class, 'viewListTags'])->name('list.tags');
    Route::get('/new-games', [HomeController::class, 'viewNewGames'])->name('new.games');
    Route::get('/best-games', [HomeController::class, 'viewBestGame'])->name('best.games');
    Route::get('/privacy', [HomeController::class, 'viewPrivacy'])->name('privacy');
    Route::get('/games/{game}', [HomeController::class, 'viewGame'])->name('play.games');
    Route::get('/count-play', [HomeController::class, 'countPlay'])->name('count.play');
    Route::get('/store-player', [HomeController::class, 'storePlayer'])->name('store.player');
    Route::get('/auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);
    Route::get('/auth/facebook', [SocialLoginController::class, 'redirectToFacebook'])->name('auth.facebook');
    Route::get('/auth/facebook/callback', [SocialLoginController::class, 'handleFacebookCallback']);
    Route::get('/setLocale/{locale}', [HomeController::class, 'changeLocate'])->name('app.setLocale');
    Route::get('/verify-email', [HomeController::class, 'viewVerify'])->name('verify.email');
    Route::get('/report-bug', [HomeController::class, 'reportBug'])->name('report.bug');
    Route::get('/store-comments', [HomeController::class, 'storeComments'])->name('store.comments');
    Route::post('/store-comments-posts', [HomeController::class, 'storeCommentPosts'])->name('store.comment.post');
});

Route::get('/reset-password', [HomeController::class, 'viewResetPassword'])->name('reset.password');
Route::get('/reset-password-success', [HomeController::class, 'viewResetPasswordSuccess'])->name('reset.password.success');
Route::get('/register-retry', [HomeController::class, 'registerRetry'])->name('register.retry');
Route::get('/unsubscribe', [HomeController::class, 'unsubscribe'])->name('unsubscribe');
Route::get('/post/{slug}', [HomeController::class, 'post'])->name('post');

Route::middleware(['auth:sanctum', config('jetstream.auth_session')])->group(function () {

    Route::get('/user-info/{nick_name}', [ProfileController::class, 'show'])->name('user.show');
    Route::get('/user-profile', [ProfileController::class, 'edit'])->name('user.edit');
    Route::post('/user-profile/{id}', [ProfileController::class, 'update'])->name('user.update');
    Route::get('/game-played', [ProfileController::class, 'gamePlayed'])->name('game.played');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::get('/user-favorite', [ProfileController::class, 'favoriteGame'])->name('user.favorite');
    Route::get('/vote-by-user', [GameController::class, 'voteByUser'])->name('vote.by.user');
    Route::get('/save-collection', [GameController::class, 'saveCollection'])->name('save.collection');

    Route::middleware(['admin'])->group(
        function () {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::get('/list-user', [UserController::class, 'index'])->name('user.index');
            Route::get('/user/{id}', [UserController::class, 'showUser'])->name('user.showUser');
            Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
            Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('user.editUser');
            Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('user.updateUser');

            Route::get('/list-game', [GameController::class, 'index'])->name('game.index');
            Route::get('/game-info/{id}', [GameController::class, 'showGame'])->name('game.showGame');
            Route::get('/create-game', [GameController::class, 'create'])->name('game.create');
            Route::post('/store-game', [GameController::class, 'store'])->name('game.store');
            Route::get('/edit-game/{id}', [GameController::class, 'edit'])->name('game.edit');
            Route::post('/update-game/{id}', [GameController::class, 'update'])->name('game.update');
            Route::post('/delete-game', [GameController::class, 'delete'])->name('game.delete');

            Route::get('/list-category', [CategoryController::class, 'index'])->name('category.index');
            Route::get('/category-info/{id}', [CategoryController::class, 'showCategory'])->name('category.showCategory');
            Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store-category', [CategoryController::class, 'store'])->name('category.store');
            Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');

            Route::get('/list-report', [ReportBugController::class, 'index'])->name('report.index');
            Route::get('/report-info/{id}', [ReportBugController::class, 'showReport'])->name('report.show');

            Route::get('/list-comment', [CommentController::class, 'index'])->name('comment.index');
            Route::get('/comment-info/{id}', [CommentController::class, 'showComment'])->name('comment.show');
            Route::get('/change-comment-status', [CommentController::class, 'changeStatusComment'])->name('change.status.comment');

            Route::get('/list-achievement', [AchievementController::class, 'index'])->name('achievement.index');
            Route::get('/achievement-info/{id}', [AchievementController::class, 'showAchievement'])->name('achievement.show');
            Route::get('/create-achievement', [AchievementController::class, 'create'])->name('achievement.create');
            Route::post('/store-achievement', [AchievementController::class, 'store'])->name('achievement.store');
            Route::get('/edit-achievement/{id}', [AchievementController::class, 'edit'])->name('achievement.edit');
            Route::post('/update-achievement/{id}', [AchievementController::class, 'update'])->name('achievement.update');
            Route::post('/delete-achievement', [AchievementController::class, 'delete'])->name('achievement.delete');

            Route::get('/list-search', [AdminController::class, 'listSearch'])->name('search.index');
            Route::post('/create-search', [AdminController::class, 'createSearch'])->name('search.create');
            Route::get('/edit-search/{id}', [AdminController::class, 'editSearch'])->name('search.edit');

            Route::get('/list-tags', [AdminController::class, 'listTag'])->name('tag.index');
            Route::get('/edit-tag/{id}', [AdminController::class, 'editTag'])->name('tag.edit');

            Route::get('/list-post', [PostController::class, 'listPost'])->name('post.index');
            Route::get('/create-post', [PostController::class, 'createPost'])->name('post.create');
            Route::post('/store-post', [PostController::class, 'storePost'])->name('post.store');
            Route::get('/former-slug-post', [PostController::class, 'formerSlugPost']);
            Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('post.edit');
            Route::get('/delete-post', [PostController::class, 'deletePost'])->name('post.delete');
            Route::post('/update-post/{id}', [PostController::class, 'updatePost'])->name('post.update');

            Route::get('/get-chart-count-play', [AdminController::class, 'getChartCountPlay']);
            Route::get('/get-chart-user', [AdminController::class, 'getChartUserRegister']);

            Route::get('/former-slug', [AchievementController::class, 'formerSlug']);

            Route::post('/dropzone-upload', [GameController::class, 'uploadFileDropzone'])->name('dropzone.upload');
        }
    );
});
