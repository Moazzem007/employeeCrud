<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/allDepartments', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('departments');
Route::post('/addDepartment', [\App\Http\Controllers\DepartmentController::class, 'addDepartment'])->name('add.department');
Route::post('/updateDepartment', [\App\Http\Controllers\DepartmentController::class, 'updateDepartment'])->name('update.department');
Route::post('/deleteDepartment', [\App\Http\Controllers\DepartmentController::class, 'deleteDepartment'])->name('delete.department');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
