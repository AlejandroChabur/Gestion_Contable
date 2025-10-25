<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HabitacionApiController;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\ReservaApiController;
use App\Http\Controllers\Api\FacturaApiController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas (sin autenticación)
|--------------------------------------------------------------------------
*/

// Registro y Login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Pruebas o diagnóstico (puedes dejarlo mientras desarrollas)
Route::get('/usuarios', fn() => response()->json(['mensaje' => 'API funcionando correctamente']));
Route::get('/test-cors', fn() => response()->json(['message' => 'CORS funcionando correctamente']));

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (requieren autenticación con token Sanctum)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Recursos principales protegidos
    Route::apiResource('facturas', FacturaApiController::class);
    Route::apiResource('reservas', ReservaApiController::class);
    Route::apiResource('clientes', ClienteApiController::class);
    Route::apiResource('habitaciones', HabitacionApiController::class);
});
