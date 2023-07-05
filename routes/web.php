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
    return view('welcome');
});

Route::get('/test', function () {
    $ch = curl_init();
    $url = "https://v6p9d9t4.ssl.hwcdn.net/html/8119337/FEARASSESSMENTMOBILE2/index.html/";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $content = curl_exec($ch);
    curl_close($ch);

    dd($content);
});

Route::get('/get-link', [GameController::class, 'getLinksGame']);
Route::group(['prefix' => 'games'], function () {
    Route::get('/{name}', [GameController::class, 'viewGame']);
});
