<?php

use App\Http\Controllers\Api\aboutUs\AboutController;
use App\Http\Controllers\Api\contactUs\TaskContactController;
use App\Http\Controllers\Api\home\HomeController;
use App\Http\Controllers\Api\links\LinkController;
use App\Http\Controllers\Api\services\servicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
#################################Api Contact Us################################
Route::prefix('contact')->group(function(){
    Route::get('list',[TaskContactController::class,'index']);
    Route::post('create',[TaskContactController::class,'Insert']);
    Route::put('edit/{contactUs}',[TaskContactController::class,'Update']);
    Route::delete('delete/{contactUs}',[TaskContactController::class,'Delete']);
});
#################################End Api Contact Us################################
#################################Api about Us################################
Route::prefix('about')->group(function(){
    Route::get('list',[AboutController::class,'index']);
    Route::post('create',[AboutController::class,'Insert']);
    Route::put('edit/{aboutUs}',[AboutController::class,'Update']);
    Route::delete('delete/{aboutUs}',[AboutController::class,'Delete']);
});
#################################End Api abour Us################################
#################################Api Links################################
Route::prefix('links')->group(function(){
    Route::get('list',[LinkController::class,'index']);
    Route::post('create',[LinkController::class,'Insert']);
    Route::put('edit/{link}',[LinkController::class,'Update']);
    Route::delete('delete/{link}',[LinkController::class,'Delete']);
});
#################################End Api Links################################
#################################Api Home################################
Route::prefix('home')->group(function(){
    Route::get('list',[HomeController::class,'index']);
    Route::post('create',[HomeController::class,'Insert']);
    Route::delete('delete/{home}',[HomeController::class,'Delete']);
});
#################################End Api Home################################
#################################Api Home################################
Route::prefix('services')->group(function(){
    Route::get('list',[servicesController::class,'index']);
    Route::post('create',[servicesController::class,'Insert']);
    Route::put('edit/{Services}',[servicesController::class,'Update']);
    Route::delete('delete/{Services}',[servicesController::class,'Delete']);
});
#################################End Api Home################################

