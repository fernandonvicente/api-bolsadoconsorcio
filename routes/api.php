<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OperatorController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\QuotaCanceledController;
use App\Http\Controllers\Api\RoleUserController;
use App\Http\Controllers\Api\UploadDownloaFileController;


use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {

});

Route::apiResource('/supports', SupportController::class);
Route::apiResource('/operators', OperatorController::class);//Operadoras
Route::apiResource('/users', UserController::class);//Usuarios

Route::apiResource('/quotas-canceled', QuotaCanceledController::class);
Route::apiResource('/role-users', RoleUserController::class);
Route::apiResource('/upload-excel-cancelad', UploadDownloaFileController::class);

Route::post('/upload-excel-cancelad', [UploadDownloaFileController::class, 'uploadExcelCancelad'])->name('uploadDownloaFile.uploadExcelCancelad');
Route::get('/download-excel-example-cancelad/{file}', [UploadDownloaFileController::class, 'downloadExcelExampleCancelad'])->name('uploadDownloaFile.downloadExcelExampleCancelad');
