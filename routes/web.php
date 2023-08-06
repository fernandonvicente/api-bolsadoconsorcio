<?php

use App\Http\Controllers\Admin\{OperatorController, SupportController};
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

// Route::resource('/supports', SupportController::class);
Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');


Route::delete('/operators/{id}', [OperatorController::class, 'destroy'])->name('operators.destroy');
Route::put('/operators/{id}', [OperatorController::class, 'update'])->name('operators.update');
Route::get('/operators/{id}/edit', [OperatorController::class, 'edit'])->name('operators.edit');
Route::get('/operators/create', [OperatorController::class, 'create'])->name('operators.create');
Route::get('/operators/{id}', [OperatorController::class, 'show'])->name('operators.show');
Route::post('/operators', [OperatorController::class, 'store'])->name('operators.store');
Route::get('/operators', [OperatorController::class, 'index'])->name('operators.index');

Route::get('/contato', [SiteController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});
