<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaApiController extends Controller
{
    public function index()
    {
        return Factura::with('reserva')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'fecha_emision' => 'required|date',
            'subtotal' => 'required|numeric|min:0',
            'impuestos' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string',
            'estado' => 'in:pendiente,pagada,anulada',
        ]);

        return Factura::create($request->all());
    }

    public function show($id)
    {
        return Factura::with('reserva')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->update($request->all());
        return $factura;
    }

    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();
        return response()->noContent();
    }
}
