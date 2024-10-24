<?php

use App\Http\Controllers\IndexController; //menggunakan kelas IndexController sesuai url
use App\Http\Controllers\ProfileController;
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

Route::get('/', [IndexController::class, 'index'])->name('welcome'); //URL '/' pada browser mengembalikan function index pada kelas IndexController
Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::get('/dashboard', [ProfileController::class,'bookView'])->name('bookView');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile'); //name digunakan pada saat memanggil rute di html
Route::get('/create', [ProfileController::class, 'createV'])->name('create');
Route::post('/profile',[ProfileController::class, 'store'])->name('store'); 
Route::delete('/profile/{id}',[ProfileController::class, 'destroy'])->name('delete'); 
Route::get('{book}/edit', [ProfileController::class, 'edit'])->name('edit');
Route::put('{book}/', [ProfileController::class, 'update'])->name('update');
Route::get('{book}/detailed', [ProfileController::class, 'detailed'])->name('detailed');