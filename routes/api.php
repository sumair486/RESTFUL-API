<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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

Route::get('data',[ApiController::class,'getapi']);

Route::get('/country',[CountryController::class,'countryapi']);
Route::get('/country/{id}',[CountryController::class,'countryapi_id']);
Route::post('/country',[CountryController::class,'countrysave']);
Route::put('/countryupdate/{id}',[CountryController::class,'countryedit']);
Route::delete('/countrydelete/{id}',[CountryController::class,'countrydelete']);



