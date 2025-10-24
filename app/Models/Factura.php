<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $fillable = [
        'reserva_id',
        'fecha_emision',
        'subtotal',
        'impuestos',
        'total',
        'metodo_pago',
        'estado',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
