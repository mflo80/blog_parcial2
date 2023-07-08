<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'cuerpo',
        'idUsuario',
        'fechaHora'
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
