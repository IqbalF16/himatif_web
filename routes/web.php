<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminBlog;
use App\Http\Controllers\Admin\AdminForm;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminEvent;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/blog/view/{route_title}', [BlogController::class, 'view'])->name('viewBlog');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::group(['middleware' => ['role:admin'], 'middleware' => 'auth'], function () {
    Route::get('/admin', function(){
        return redirect()->route('adminSummary');
    })->name('adminDashboard');
    Route::get('/admin/summary', [AdminController::class, 'index'])->name('adminSummary');
    Route::get('/admin/blog', [AdminController::class, 'blog'])->name('adminBlog');
    Route::get('/admin/event', [AdminController::class, 'event'])->name('adminEvent');
    Route::get('/admin/form', [AdminController::class, 'form'])->name('adminForm');

    Route::get('/admin/blog/write', [AdminBlog::class, 'index'])->name('writeBlog');
    Route::post('/admin/blog/add', [AdminBlog::class, 'add'])->name('addBlog');
    Route::get('/admin/blog/{delete}', [AdminBlog::class, 'delete'])->name('deleteBlog');
    Route::get('/admin/blog/edit', [AdminBlog::class, 'edit'])->name('editBlog');

    Route::get('/admin/event/write', [AdminEvent::class, 'index'])->name('writeEvent');
    Route::get('/admin/event/add', [AdminEvent::class, 'add'])->name('addEvent');
    Route::get('/admin/event/delete', [AdminEvent::class, 'delete'])->name('deleteEvent');
    Route::get('/admin/event/edit', [AdminEvent::class, 'edit'])->name('editEvent');

    Route::get('/admin/form/write', [AdminForm::class, 'index'])->name('writeForm');
    Route::get('/admin/form/add', [AdminForm::class, 'add'])->name('addForm');
    Route::get('/admin/form/delete', [AdminForm::class, 'delete'])->name('deleteForm');
    Route::get('/admin/form/edit', [AdminForm::class, 'edit'])->name('editForm');
});

Route::get('/redirect-to-previous-url', function(){
    return redirect()->route('home');
})->name("back");
