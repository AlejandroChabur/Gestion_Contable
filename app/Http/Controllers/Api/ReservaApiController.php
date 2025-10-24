<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaApiController extends Controller
{
    public function index()
    {
        return Reserva::with(['cliente', 'habitacion'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'habitacion_id' => 'required|exists:habitaciones,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'total' => 'required|numeric|min:0',
            'estado' => 'in:activa,cancelada,finalizada',
        ]);

        return Reserva::create($request->all());
    }

    public function show($id)
    {
        return Reserva::with(['cliente', 'habitacion'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->all());
        return $reserva;
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return response()->noContent();
    }
}
