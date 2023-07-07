<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $primaryKey = 'id';
   // public $timestamps = false;
    protected $fillable = [
        'titulo',
        'cuerpo',
        'fechaHora',
        'idUsuario'
    ];

    public function obtenerPost()
    {
        return Post::all();
    }

    public function obtenerPostPorId($id)
    {
        return Post::find($id);
    }
}
