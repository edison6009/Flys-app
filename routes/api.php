<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\TicketController;
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
Route::get('/clients/type/clients', [ClientController::class, 'typeClients']);
Route::get('/clients/restore/{id}', [ClientController::class, 'restore']);

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

Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);
Route::put('/tickets/{id}', [TicketController::class, 'update']);
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);
Route::get('/tickets/restore/{id}', [TicketController::class, 'restore']);
Route::get('/tickets/saludo/hola', [TicketController::class, 'hola']);
Route::get('/tickets/active/now', [TicketController::class, 'activeTickets']);


Route::get('/airline', [AirlineController::class,'index']);
Route::post('/airline', [AirlineController::class, 'store']);
Route::get('/airline/{id}', [AirlineController::class, 'show']);
Route::put('/airline/{id}', [AirlineController::class, 'update']);
Route::delete('/airline/{id}', [AirlineController::class, 'destroy']);

Route::get('/infrastructure', [InfrastructureController::class,'index']);
Route::post('/infrastructure', [InfrastructureController::class, 'store']);
Route::get('/infrastructure/{id}', [InfrastructureController::class, 'show']);
Route::put('/infrastructure/{id}', [InfrastructureController::class, 'update']);
Route::delete('/infrastructure/{id}', [InfrastructureController::class, 'destroy']);

Route::get('/incidents', [IncidentController::class,'index']);
Route::post('/incidents', [IncidentController::class, 'store']);
Route::get('/incidents/{id}', [IncidentController::class, 'show']);
Route::put('/incidents/{id}', [IncidentController::class, 'update']);
Route::delete('/incidents/{id}', [IncidentController::class, 'destroy']);




