<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    use HasFactory;

    protected $table = 'publicidad';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'URL',
        'fechaExpiracion'
    ];

    public function obtenerPublicidad()
    {
        return Publicidad::all();
    }

    public function obtenerPublicidadPorId($id)
    {
        return Publicidad::find($id);
    }
}
