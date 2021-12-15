<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/projectinfo', function () {
    return view('aboutproject');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function (Request $request) {
    $role = Auth::user()->verified_user;
    if ($role == '1') {
        // return view('dashboard');
        // Route::get('/dashboard', [SearchController::class, 'allArticles']);
        return redirect()->action([ArticleController::class, 'index']);
        // Route::resource('dashboard', ArticleController::class)->only([
        //     'index'
        // ]);
    } else {
        echo '<script type="text/javascript">alert("In order to login. You need to get access from admin!");</script>';
        Cookie::queue(Cookie::forget('laravel_session'));
        Cookie::queue(Cookie::forget('XSRF-TOKEN'));
        // return back();
        // return redirect()->back()->with('alert', 'Deleted!');
        return back();
    }
})->name('dashboard');

Route::get('redirect_to', [HomeController::class, 'index'])->middleware(['auth:sanctum', 'verified']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

Route::get('/getkeyid', [KeyController::class, 'index']);

Route::get('/key/{keyid}', [KeyController::class, 'keyresults']);

Route::get('/article', [SearchController::class, 'index'])->name('search');

Route::get('/allarticles', [ArticleController::class, 'index']);

Route::get('/article/{id}', [PanelController::class, 'index']);

Route::get('/article/{id}/dashboard', [PanelController::class, 'dashboard']);

Route::get('/article/{id}/snopes', [PanelController::class, 'dashboard']);

Route::get('/article/{id}/survey', [PanelController::class, 'dashboard']);

Route::get('/article/{id}/updatedetails', [PanelController::class, 'surveryDetails']);

Route::get('/policy', function() {
    return view('policy');
});

// Route::get('/snoopes', function () {
//     return view('dashboard');
// })->name('snoopes');

// Route::get('/survey', function () {
//     return view('dashboard');
// })->name('survey');