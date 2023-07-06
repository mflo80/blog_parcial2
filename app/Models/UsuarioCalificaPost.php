<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioCalificaPost extends Model
{
    use HasFactory;

    protected $table = 'usuarioCalificaPost';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'idPost',
        'puntuacion',
        'fecha'
    ]; 
}
