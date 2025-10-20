<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionApiController extends Controller
{
    public function index()
    {
        return response()->json(Habitacion::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:habitaciones',
            'tipo' => 'required',
            'precio_noche' => 'required|numeric',
            'estado' => 'required',
        ]);

        $habitacion = Habitacion::create($request->only(['numero', 'tipo', 'precio_noche', 'estado']));
        return response()->json($habitacion, 201);
    }

    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada'], 404);
        }
        return response()->json($habitacion, 200);
    }

    public function update(Request $request, $id)
    {
        $habitacion = Habitacion::find($id);
        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada'], 404);
        }

        $request->validate([
            'numero' => 'required|unique:habitaciones,numero,' . $habitacion->id,
            'tipo' => 'required',
            'precio_noche' => 'required|numeric',
            'estado' => 'required',
        ]);

        $habitacion->update($request->only(['numero', 'tipo', 'precio_noche', 'estado']));
        return response()->json($habitacion, 200);
    }

    public function destroy($id)
    {
        $habitacion = Habitacion::find($id);
        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada'], 404);
        }

        $habitacion->delete();
        return response()->json(['message' => 'Habitación eliminada correctamente'], 200);
    }
}
