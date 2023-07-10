<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $users;
    
    public function __construct(User $users){
        $this->users = $users;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sblog-usuarios');
    }

    public static function ShowNombreUsuario($id){
        $nombre_usuario = DB::table('users')
            ->select('users.name')
            ->where('users.id', '=', $id)
            ->value('name');

        return $nombre_usuario;
    }
}
