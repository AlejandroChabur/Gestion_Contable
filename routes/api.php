<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HabitacionApiController;
use App\Http\Controllers\Api\ClienteApiController;

Route::apiResource('clientes', ClienteApiController::class);
Route::apiResource('habitaciones', HabitacionApiController::class);

// Ruta de prueba
Route::get('/test-cors', function (Request $request) {
    return response()->json(['message' => 'CORS funcionando correctamente']);
});
