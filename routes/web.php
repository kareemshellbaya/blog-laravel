<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\PostFrontController;
use App\Http\Controllers\CategoryFrontController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [MainPageController::class, 'index'])->name('home');
    }
);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('dashboard')
    ->middleware((['auth', 'verified', 'dashAccess']))
    ->as('dashboard.')
    ->group(function () {


        Route::get('/', function () {
            return view('dashboard');
        })->name('main');

        Route::resources([
            'setting' => SettingController::class,
            'users' => UserController::class,
            'categories' => CategoryController::class,
            'posts' => PostController::class,
        ]);

        Route::get('categories/restore/{category}', [CategoryController::class, 'restore'])->name('categories.restore');
        Route::get('categories/erase/{category}', [CategoryController::class, 'erase'])->name('categories.erase');
        //    post(soft delete)
        Route::get('posts/restore/{post}', [PostController::class, 'restore'])->name('posts.restore');
        Route::get('posts/erase/{post}', [PostController::class, 'erase'])->name('posts.erase');
    });

// front route
Route::get('categories/{category}', [CategoryFrontController::class, 'index'])->name('categories.show');
Route::get('posts/{post}', [PostFrontController::class, 'index'])->name('posts.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
