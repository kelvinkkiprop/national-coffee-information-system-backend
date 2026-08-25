<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Main
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\UserController;
use App\Http\Controllers\Main\ConstructionPermitController;
use App\Http\Controllers\Main\DetailedDesignController;
use App\Http\Controllers\Main\ParcelAllocationWorksheetController;
// Settings
use App\Http\Controllers\Settings\RoleController;
// Other
use App\Http\Controllers\Other\DownloadController;
use App\Http\Controllers\Other\ProcessMasterplanController;
use App\Http\Controllers\Other\ProcessDetailedDesignController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



/*
|======================================================================
| DashboardController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('dashboard', [DashboardController::class, 'index']);
});


/*
|======================================================================
| AuthController
|======================================================================
*/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);
Route::post('recover-password/{id}', [AuthController::class, 'recoverPassword']);
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('change-password', [AuthController::class, 'changePassword']);
    Route::post('verify-email', [AuthController::class, 'verifyEmail']);
    Route::get('resend-verification-code', [AuthController::class, 'resendVerificationCode']);
});


/*
|======================================================================
| UserController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('users', UserController::class);
    Route::post('search-users', [UserController::class, 'searchItems']);
    Route::get('unpaginated-items-users', [UserController::class, 'unpaginatedItems']);
});


/*
|======================================================================
| RoleController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('roles', RoleController::class);
    Route::post('search-roles', [RoleController::class, 'searchItems']);
    Route::post('roles-search', [RoleController::class, 'professionalSearch']);
    Route::get('unpaginated-items-roles', [RoleController::class, 'unpaginatedItems']);
});
