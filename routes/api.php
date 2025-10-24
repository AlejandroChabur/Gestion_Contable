<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HabitacionApiController;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\ReservaApiController;
use App\Http\Controllers\Api\FacturaApiController;
use App\Http\Controllers\Api\AuthController;

Route::apiResource('facturas', FacturaApiController::class);
Route::apiResource('reservas', ReservaApiController::class);
Route::apiResource('clientes', ClienteApiController::class);
Route::apiResource('habitaciones', HabitacionApiController::class);

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/usuarios', function () {
    return response()->json(['mensaje' => 'API funcionando correctamente']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Ruta de prueba
Route::get('/test-cors', function (Request $request) {
    return response()->json(['message' => 'CORS funcionando correctamente']);
});
