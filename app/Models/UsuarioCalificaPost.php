<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioCalificaPost extends Model
{
    use HasFactory;

    protected $table = 'usuario_califica_post';
    public $timestamps = false;
    protected $fillable = [
        'idUsuario',
        'idPost',
        'puntuacion',
        'fecha'
    ]; 

    public function obtenerTabla()
    {
        return UsuarioCalificaPost::all();
    }

    public function obtenerTablaPorIdUsuario($idUsuario)
    {
        return UsuarioCalificaPost::find($idUsuario);
    }

    public function obtenerTablaPorIdPost($idPost)
    {
        return UsuarioCalificaPost::find($idPost);
    }
}
