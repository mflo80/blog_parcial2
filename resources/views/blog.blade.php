<?php
    if( auth()->check() ){
        header("Location: sblog");
        exit();
    } 
?>

@extends('home')

@section('content')

    <div>
        @foreach($posts as $post)
            <div>
                <h2>
                    {{ $post->titulo }}
                </h2>
                <p>
                    {{ $post->cuerpo }}
                </p>
                <p>
                    Autor: {{ $post->idUsuario }}
                </p>
                <p>
                    Creado: {{ date('d-M-Y H:m', strtotime($post->fechaHora)) }}
                </p>
    
                <hr size="1px" color="black">
            </div>
        @endforeach
        <center class="paginas">
            {{  $posts->withQueryString()->links() }}
        </center>
    </div>

@endsection
