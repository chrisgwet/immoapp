<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/agents', [App\Http\Controllers\AgentController::class, 'index'])->name('agents');
Route::get('/properties', [App\Http\Controllers\PropertyController::class, 'index'])->name('front.properties.index');
Route::get('/home/properties', [App\Http\Controllers\PropertyController::class, 'indexForHome'])->name('front.properties.indexforhome');
Route::get('/properties/show/{id}', [App\Http\Controllers\PropertyController::class, 'show'])->name('front.properties.show');

Route::group(['middleware' => ['auth']], function (){
    Route::post('/properties/comment/{idProperty}', [App\Http\Controllers\PropertyController::class, 'toComment'])->name('front.properties.comment');
    Route::post('/properties/planvisit/{idProperty}', [App\Http\Controllers\PropertyController::class, 'toPlanVisit'])->name('front.properties.planvisit');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('admin/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('admin/roles', RoleController::class);
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/comments', CommentController::class);
    Route::post('/admin/categories/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
    Route::post('/admin/properties/edit/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'update'])->name('admin.properties.update');
    Route::post('/admin/roles/edit/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update');
    Route::post('/admin/users/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');

    Route::resource('admin/proprietes', PropertyController::class);
    Route::resource('admin/visites', \App\Http\Controllers\Admin\VisitController::class);
    Route::post('/admin/visites/edit/{id}', [App\Http\Controllers\Admin\VisitController::class, 'update'])->name('admin.visites.update');
});
