<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index(){
        return view("index");
    }
    public function registro(){
        return view("registro");
    }
    public function login(){
        return view("login");
    }
    public function crear(){
        return view("crear");
    }
    public function post($numero){
        return view("post?=$numero");
    }
}
