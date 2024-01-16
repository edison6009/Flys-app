<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\PlaneController;
use App\Models\TypeDocument;
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

Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients/{id}', [ClientController::class, 'show']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::delete('/clients/{id}', [ClientController::class, 'destroy']);

Route::get('/typedocuments', [TypeDocumentController::class,'index']);
Route::post('/typedocuments', [TypeDocumentController::class,'store']);
Route::get('/typedocuments/{id}', [TypeDocumentController::class,'index']);
Route::put('/typedocuments/{id}', [TypeDocumentController::class,'update']);
Route::delete('/typedocuments/{id}', [TypeDocumentController::class,'destroy']);


Route::get('/planes', [PlaneController::class,'index']);
Route::post('/planes', [PlaneController::class,'store']);
Route::get('/planes/{id}', [PlaneController::class,'show']);
Route::put('/planes/{id}', [PlaneController::class,'update']);
Route::delete('/planes/{id}', [PlaneController::class,'destroy']);

Route::get('/countries', [CountryController::class,'index']);
Route::post('/countries', [CountryController::class,'store']);
Route::get('/countries/{id}', [CountryController::class,'show']);
Route::put('/countries/{id}', [CountryController::class,'update']);
Route::delete('/countries/{id}', [CountryController::class,'destroy']);




