@extends('home')

@section('content')

    <div>
        <div>
                <h3>
                    PRUEBA
                </h3>
                <p>
                    PRUEBA
                </p>
                <p>
                    PRUEBA
                </p>
                <p>
                    PRUEBA
                </p>
                <p>
                    PRUEBA
                </p>
        
                
                @if( auth()->check() )
                    @if($post->idUsuario != auth()->user()->id)
                        <button>
                            Calificar
                        </button>
                    @endif
                    @if($post->idUsuario == auth()->user()->id)
                        <button>
                            Modificar
                        </button>
                        <button>
                            Eliminar
                        </button>
                    @endif
                    
                    <br><br>
                @endif
                          
                <hr size="1px" color="black">
            </div>
        
        <center>
            <a href="sblog">Página anterior</a></p>
        </center>
    </div>

@endsection
