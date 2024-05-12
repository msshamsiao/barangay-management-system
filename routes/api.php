<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RequestController;
use App\Http\Controllers\API\ResidentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout']);

Route::post('register', [AuthController::class, 'register']);

Route::resource('barangay-certificates', 'BarangayCertificateController');
Route::resource('barangay-ids', 'BarangayIDController');
Route::resource('business-location-permits', 'BusinessLocationPermitController');
Route::resource('barangay-clearances', 'BarangayClearanceController');
Route::resource('barangay-facilities', 'BarangayFacilityController');

Route::post('/residents', [ResidentController::class, 'store']);

Route::post('/requests', [RequestController::class, 'store']);

Route::get('/request-type', [RequestController::class, 'getRequestType']);