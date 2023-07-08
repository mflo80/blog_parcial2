@extends('template')

@section('content')
    <center>
        <div class="container">
            <h3>Crear Post</h3>
            
            <div class="form">
                <form action="sblog-editar-{{$post->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="table">
                        <table>
                            <tr>
                                <td>
                                    <label for="titulo">Título:</label>
                                    <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $post->titulo }}" size="115" maxlength="100" required autocomplete="titulo">
                                </td>
                            </tr>

                            <tr>
                                <td 
                                    class="divider">
                                    <br>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <textarea name="cuerpo" value="{{ old('cuerpo') }}" rows="19" cols="108" maxlength="2000" autocomplete="cuerpo" style="resize:none">{{$post->cuerpo}}</textarea>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <center>
                                        <button type="submit">Modificar</button>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>    
            </div>

            <br>
                <hr size="1px" color="black">
            <br>
        </div>

        <a href="javascript:history.back()">Página anterior</a></p>
    </center>
@endsection