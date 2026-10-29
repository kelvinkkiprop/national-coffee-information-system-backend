<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Main
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\UserController;
use App\Http\Controllers\Main\PermitController;
use App\Http\Controllers\Main\PaymentController;
use App\Http\Controllers\Main\LicenseController;
// Settings
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\ProfileController;
// Others
use App\Http\Controllers\Others\ProcessPermitController;
use App\Http\Controllers\Others\ProcessLicenseController;


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
    Route::get('resend-otp', [AuthController::class, 'resendOTP']);
    Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
});


/*
|======================================================================
| PermitController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('permits', PermitController::class);
    Route::post('search-permits', [PermitController::class, 'searchItems']);
    Route::get('unpaginated-items-permits', [PermitController::class, 'unpaginatedItems']);
    Route::get('permits-pdf/{id}', [PermitController::class, 'generatePermitPdf']);
});
// Route::get('permits-pdf/{id}', [PermitController::class, 'generatePermitPdf']);
Route::get('verify-permit/{id}', [PermitController::class, 'verifyPermit']);

/*
|======================================================================
| ProcessPermitController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('next-previous-status-process-permits/{id}', [ProcessPermitController::class, 'nextPreviousItems']);
    Route::post('review-process-permits/{id}', [ProcessPermitController::class, 'reviewApplicationItem']);
    Route::post('approve-process-permits/{id}', [ProcessPermitController::class, 'approveApplicationItem']);
});


/*
|======================================================================
| LicenseController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('licenses', LicenseController::class);
    Route::post('search-licenses', [LicenseController::class, 'searchItems']);
    Route::get('unpaginated-items-licenses', [LicenseController::class, 'unpaginatedItems']);
    // Route::get('licenses-pdf/{id}', [LicenseController::class, 'generateLicensePdf']);
});
Route::get('licenses-pdf/{id}', [LicenseController::class, 'generateLicensePdf']);
Route::get('verify-license/{id}', [LicenseController::class, 'verifyLicense']);

/*
|======================================================================
| ProcessLicenseController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('next-previous-status-process-licenses/{id}', [ProcessLicenseController::class, 'nextPreviousItems']);
    Route::post('review-process-licenses/{id}', [ProcessLicenseController::class, 'reviewApplicationItem']);
    Route::post('approve-process-licenses/{id}', [ProcessLicenseController::class, 'approveApplicationItem']);
});


/*
|======================================================================
| PaymentController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('payments', PaymentController::class);
    Route::post('search-payments', [PaymentController::class, 'searchItems']);
    Route::get('unpaginated-items-payments', [PaymentController::class, 'unpaginatedItems']);

    Route::get('generate-invoice-payments/{id}', [PaymentController::class, 'invoiceItem']);
    Route::get('receipt-pdf/{id}', [PaymentController::class, 'receiptPdf']);
    Route::get('settled-payments/{id}', [PaymentController::class, 'settledItem']);
});
// Route::get('receipt-pdf/{id}', [PaymentController::class, 'receiptPdf']);


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
    Route::get('unpaginated-items-roles', [RoleController::class, 'unpaginatedItems']);
});


/*
|======================================================================
| ProfileController
|======================================================================
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('profile', ProfileController::class);
    Route::post('search-profile', [ProfileController::class, 'searchItems']);
    Route::get('unpaginated-items-profile', [ProfileController::class, 'unpaginatedItems']);

    Route::get('filter-counties/{id}', [ProfileController::class, 'filterCounties']);
    Route::get('filter-sub-counties/{id}', [ProfileController::class, 'filterSubCounties']);
    Route::get('filter-wards/{id}', [ProfileController::class, 'filterWards']);
});
