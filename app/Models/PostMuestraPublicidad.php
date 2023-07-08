<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMuestraPublicidad extends Model
{
    use HasFactory;

    protected $table = 'post_muestra_publicidad';

    public $timestamps = false;
    protected $fillable = [
        'idPost',
        'idPublicidad'
    ];

    public function obtenerPublicidadPorId($idPublicidad)
    {
        return PostMuestraPublicidad::find($idPublicidad);
    }

    public function obtenerPostPorId($idPost)
    {
        return PostMuestraPublicidad::find($idPost);
    }
}