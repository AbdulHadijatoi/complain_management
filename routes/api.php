<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\ComplaintController;
use App\Http\Controllers\API\ContractorController;
use App\Http\Controllers\API\HomeController;
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

Route::group(['prefix'=>'v1'],function(){
    Route::group(['prefix'=>'contractor'],function(){
        Route::post('login', [AuthController::class,'contractorLogin']);
    });

    Route::middleware('guest')->group(function () {
        Route::post('/create-complaint', [ComplaintController::class,'createComplaint']);
        Route::get('/constants', [HomeController::class,'constants']);
    });

    Route::middleware('auth:api')->group(function () {
        Route::group(['prefix'=>'contractor'],function(){
            Route::group(['prefix'=>'complaints'],function(){
                Route::get('get-assigned', [ComplaintController::class,'assignedComplaints']);
                Route::post('close', [ComplaintController::class,'closeComplaint']);
            });
        });
    });
});


