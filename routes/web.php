<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostCategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserManagementController;

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

    Route::get('/user-management', [UserManagementController::class, "index"])->name('user-management');
    Route::get('/user-management/remove/{id}', [UserManagementController::class, "remove"])->name('user-management.remove');
    Route::get('/user-management/restore/{id}', [UserManagementController::class, "restore"])->name('user-management.restore');

    Route::get('/post-categories', [PostCategoriesController::class, "index"])->name('post-categories');
    Route::get('/post-categories/add', [PostCategoriesController::class, "add"])->name('post-categories.add');
    Route::post('/post-categories/store', [PostCategoriesController::class, "store"])->name("post-categories.store");
    Route::get('/post-categories/edit/{id}', [PostCategoriesController::class, "edit"])->name('post-categories.edit');
    Route::post('/post-categories/update/{id}', [PostCategoriesController::class, "update"])->name('post-categories.update');
    Route::get('/post-categories/remove/{id}', [PostCategoriesController::class, "remove"])->name('post-categories.remove');
    Route::get('/post-categories/restore/{id}', [PostCategoriesController::class, "restore"])->name('post-categories.restore');
    Route::get('/post-categories/delete/{id}', [PostCategoriesController::class, "delete"])->name('post-categories.delete');

    Route::get('/posts', [PostsController::class, "index"])->name('posts');

});
