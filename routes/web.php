<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/check-age', function () {
    echo "This page has a limited access by checkAge Middleware.";
    echo "<br>";
    echo "If you in this page, your age over 18";
})->middleware('checkAge');

Route::get('/check-age-restricted', function () {
    echo "If you in this page, that means your age is under 18";
});

Route::get('/about', [AboutController::class, 'index'])->name("about-page");
Route::get('/contact', [ContactController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
