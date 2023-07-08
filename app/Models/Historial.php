<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historial';
    public $timestamps = false;
    protected $fillable = [
        'fechaHoraCambio',
        'idPost',
        'idUsuario'
    ];

    public function obtenerHistorial()
    {
        return Historial::all();
    }

    public function obtenerHistorialPorId($id)
    {
        return Historial::find($id);
    }
}
