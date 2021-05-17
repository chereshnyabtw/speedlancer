<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\WorkController;
use App\Http\Middleware\OnlyAnonnymous;
use App\Models\Work;
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
})->name('home');

Route::middleware([OnlyAnonnymous::class])->group(function() {
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::post('/register', [AuthorizationController::class, 'register']);

    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [AuthorizationController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthorizationController::class, 'logOut']);
    Route::get('/profile', function () {
        $works = Work::latest()->where('user_id', Auth::id())->take(10)->get();
        return view('profile', ['works' => $works]);
    })->name('profile');

    Route::post('/edit', [EditController::class, 'edit']);

    Route::post('/works/add', [WorkController::class, 'add']);
});
