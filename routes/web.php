<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('anggota', [StudentsController::class, 'index'])->name('anggota.index');
    Route::get('anggota/create', [StudentsController::class, 'create'])->name('anggota.create');
    Route::post('anggota/store', [StudentsController::class, 'store'])->name('anggota.store');
    Route::get('anggota/edit/{id}', [StudentsController::class, 'edit'])->name('anggota.edit');
    Route::patch('anggota/update/{id}', [StudentsController::class, 'update'])->name('anggota.update');
    Route::delete('anggota/delete/{id}', [StudentsController::class, 'destroy'])->name('anggota.destroy');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
