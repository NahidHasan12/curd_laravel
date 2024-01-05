<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurdController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('blog');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/curd', [HomeController::class, 'create'])->name('curd.index');
Route::post('/store', [HomeController::class, 'store'])->name('curd.store');
Route::post('/featch_data', [HomeController::class, 'featch_data']);
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('curd.edit');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('curd.update');
Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('curd.delete');


