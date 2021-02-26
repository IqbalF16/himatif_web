<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
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
// wil be deleted
// Route::get('/', function () {
//     return view('welcome');
// });

// for auth on routes
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function(){
        return redirect()->route('adminSummary');
    })->name('adminDashboard');
    Route::get('/admin/summary', [AdminController::class, 'index'])->name('adminSummary');
    Route::get('/admin/blog', [AdminController::class, 'blog'])->name('adminBlog');
    Route::get('/admin/event', [AdminController::class, 'event'])->name('adminEvent');
    Route::get('/admin/form', [AdminController::class, 'form'])->name('adminForm');
});
