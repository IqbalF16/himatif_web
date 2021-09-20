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
use App\Http\Controllers\PresensiController;
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
Auth::routes(['verify' => true]);

// /response to login
// /problem to register

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [BlogController::class, 'index'])->name('berita');
Route::get('/programkerja', [EventController::class, 'index'])->name('programkerja');
Route::get('/profil', [AboutController::class, 'index'])->name('profil');

Route::get('/berita/view/{route_title}', [BlogController::class, 'view'])->name('viewBlog');
Route::get('/programkerja/view/{route_title}', [EventController::class, 'view'])->name('viewEvent');

Route::group(['middleware' => ['auth', 'verified', 'role:admin']], function () {
    Route::get('/admin', function () {
        return redirect()->route('adminSummary');
    })->name('adminDashboard');
    Route::get('/admin/summary', [AdminController::class, 'index'])->name('adminSummary');
    Route::get('/admin/berita', [AdminController::class, 'blog'])->name('adminBlog');
    Route::get('/admin/programkerja', [AdminController::class, 'event'])->name('adminEvent');
    Route::get('/admin/form', [AdminController::class, 'form'])->name('adminForm');
    Route::get('/admin/presensi', [AdminController::class, 'presensi'])->name('adminPresensi');
    Route::get('/admin/usermanagement', [AdminController::class, 'usermanagement'])->name('adminUserManagement');

    Route::get('/admin/berita/write', [AdminBlog::class, 'index'])->name('writeBlog');
    Route::post('/admin/berita/add', [AdminBlog::class, 'add'])->name('addBlog');
    Route::get('/admin/berita//delete/{title_route}', [AdminBlog::class, 'delete'])->name('deleteBlog');
    Route::get('/admin/berita/edit/{title_route}', [AdminBlog::class, 'edit'])->name('editBlog');
    Route::post('/admin/berita/update', [AdminBlog::class, 'update'])->name('updateBlog');

    Route::get('/admin/programkerja/write', [AdminEvent::class, 'index'])->name('writeEvent');
    Route::post('/admin/programkerja/add', [AdminEvent::class, 'add'])->name('addEvent');
    Route::get('/admin/programkerja/delete/{title_route}', [AdminEvent::class, 'delete'])->name('deleteEvent');
    Route::get('/admin/programkerja/edit/{title_route}', [AdminEvent::class, 'edit'])->name('editEvent');
    Route::post('/admin/programkerja/update', [AdminEvent::class, 'update'])->name('updateEvent');

    Route::get('/admin/form/write', [AdminForm::class, 'index'])->name('writeForm');
    Route::post('/admin/form/save', [AdminForm::class, 'save'])->name('saveForm');
    Route::post('/admin/form/add', [AdminForm::class, 'add'])->name('addForm');
    Route::get('/admin/form/delete/{id}', [AdminForm::class, 'delete'])->name('deleteForm');
    Route::post('/admin/form/edit/{id}', [AdminForm::class, 'edit'])->name('editForm');
    Route::post('/admin/form/update/{id}', [AdminForm::class, 'update'])->name('updateForm');

    Route::post('admin/usermanagement/save', [AdminController::class, 'saveUserManagement'])->name('saveUserManagement');
    Route::get('admin/usermanagement/delete/{name}', [AdminController::class, 'deleteUserManagement'])->name('deleteUserManagement');

    Route::post('/admin/presensi/add', [PresensiController::class, 'add'])->name('addPresensi');
    Route::get('/admin/presensi/view/{link}', [PresensiController::class, 'view'])->name('viewPresensi');
    Route::get('/admin/presensi/refresh', [PresensiController::class, 'refresh'])->name('refreshPresensi');
    Route::get('/admin/presensi/refreshname', [PresensiController::class, 'refreshname'])->name('refreshnamePresensi');
    Route::get('/admin/presensi/toggle', [PresensiController::class, 'toggle'])->name('togglePresensi');
    Route::get('/admin/presensi/delete/{id}', [PresensiController::class, 'delete'])->name('deletePresensi');
    Route::get('/admin/presensi/remove', [PresensiController::class, 'deleteData'])->name('deleteDataPresensi');
    Route::get('/admin/presensi/download', [PresensiController::class, 'download'])->name('downloadPresensi');
    
    // Route::get('/admin/presensi/{filename}', [PresensiController::class, 'file'])->name('presensiFile');
});

Route::group(['middleware' => ['auth', 'verified', 'role:user']], function (){
    Route::get('/user', [function(){
        return 'asd';
    }]);
});

Route::get('/form/{link}', [FormController::class, 'index']);
Route::get('/presensi/{link}', [PresensiController::class, 'checkin'])->name('checkin');
Route::get('/presensi/control', [PresensiController::class, 'control'])->name('checkinControl');
Route::get('/presensi/{link}/{pin}', [PresensiController::class, 'checkinauto'])->name('checkinAuto');
Route::post('/presensi/postcheckin', [PresensiController::class, 'postCheckin'])->name('postCheckin');
