<?php
    if( auth()->check() ){
        header("Location: sblog");
        exit();
    }
?>

@extends('home')

@section('content')

    <div>
        <h2>
            POST 1
        </h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. 
            Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. 
            Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. 
            Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi.
            Etiam id nibh posuere mauris pretium sollicitudin nec nec enim.
            Integer laoreet pharetra arcu, et pretium massa consequat ut.
        </p>
        <p>
            AUTOR
        </p>
        <p>
            FECHA / HORA
        </p>
        <br>
            <hr size="1px" color="black">
    </div>

    <div>
        <h2>
            POST 2
        </h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. 
            Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. 
            Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. 
            Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi.
            Etiam id nibh posuere mauris pretium sollicitudin nec nec enim.
            Integer laoreet pharetra arcu, et pretium massa consequat ut.
        </p>
        <p>
            AUTOR
        </p>
        <p>
            FECHA / HORA
        </p>
        <br>
            <hr size="1px" color="black">
    </div>

    <div>
        <h2>
            POST 3
        </h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. 
            Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. 
            Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. 
            Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi.
            Etiam id nibh posuere mauris pretium sollicitudin nec nec enim.
            Integer laoreet pharetra arcu, et pretium massa consequat ut.
        </p>
        <p>
            AUTOR
        </p>
        <p>
            FECHA / HORA
        </p>
        <br>
            <hr size="1px" color="black">
    </div>

@endsection