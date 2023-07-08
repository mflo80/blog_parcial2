<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'mflorio',
            'email' => 'mflo80@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        DB::table('users')->insert([
            'name' => 'prodriguez',
            'email' => 'patriciar@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        DB::table('users')->insert([
            'name' => 'jperez',
            'email' => 'juanperez@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        DB::table('post')->insert([
            'titulo' => 'Hola Mundo',
            'cuerpo' => 'En informática, "Hola, mundo" o "Hello, World!", en inglés es un programa que muestra el texto «¡Hola, mundo!» en un dispositivo de visualización, en la mayoría de los casos la pantalla de un monitor. Este programa suele ser usado como introducción al estudio de un lenguaje de programación, siendo un primer ejercicio típico, y se considera fundamental desde el punto de vista didáctico. https://es.wikipedia.org/wiki/Hola_mundo',
            'idUsuario' => 1,
            'fechaHora' => now(),
        ]);

        DB::table('post')->insert([
            'titulo' => 'Uruguay Campeón',
            'cuerpo' => 'La Selección Uruguaya Sub 20 demostró mucho carácter no solo a lo largo de la Copa del Mundo, sino sobre todo en la final ante Italia para imponerse por 1-0 y quedarse con su primer Mundial de la categoría de la historia, con un gol de Luciano Rodríguez a los 86 min que desató la locura de los 38.000 uruguayos presentes en el Estadio Único Diego Armando Maradona y que gritaron 3 millones. https://www.espn.com.uy/futbol/nota/_/id/12182211/con-garra-y-futbol-uruguay-italia-campeon-mundial-sub-20',
            'idUsuario' => 2,
            'fechaHora' => now(),
        ]);

        DB::table('post')->insert([
            'titulo' => 'Guerra de Pedos 2023',
            'cuerpo' => 'En Montevideo capital de la República Oriental del Uruguay, se llevó a cabo un inédito torneo (Guerra de Pedos), el gordo Juan Pérez logró obtener el primer título, al dejar desmayado a casi todo el público, incluído los jueces. Es de destacar que Juan es uno de los usuarios de honor de este blog, por lo que se le envía las felicitaciones por parte de Simple Blog por el título obtenido.',
            'idUsuario' => 1,
            'fechaHora' => now(),
        ]);

        DB::table('post')->insert([
            'titulo' => 'Resumen de la película El Ataque de los Tomates Asesinos',
            'cuerpo' => 'El ataque de los tomates asesinos es una película de comedia de bajo presupuesto estrenada en el año 1978, dirigida y escrita por John de Bello en su debut con este largometraje basado en un corto homónimo. Para la realización de esta película se dispuso de un presupuesto de 90.000 dólares. Debido a la escasez presupuestaria, De Bello consiguió sacar adelante la película mediante la utilización de una serie de soluciones nada profesionales, motivo por el cual está considerada como una de las peores películas de la historia del cine norteamericano. https://es.wikipedia.org/wiki/El_ataque_de_los_tomates_asesinos',
            'idUsuario' => 3,
            'fechaHora' => now(),
        ]);

        DB::table('post')->insert([
            'titulo' => 'Como hacer barquitos de papel',
            'cuerpo' => 'Pasos: 1) Dobla el folio a la mitad, como en la imagen. 
                2) Ponlo en posición horizontal y pliega los bordes hacia el centro haciendo un pentágono. 
                3) Tomas los pliegues inferiores y dobla hacia arriba formando un sombrero de papel. 
                4) Repite la doblez. Esta vez hazla con la parte inferior hasta que quede un triángulo con tres solapas. 
                5) Abre las palas laterales estirando hacia los lados para obtener el barquito de papel. https://saposyprincesas.elmundo.es/ocio-en-casa/manualidades-para-ninos/como-hacer-un-barco-de-papel/',
            'idUsuario' => 2,
            'fechaHora' => now(),
        ]);

        DB::table('post')->insert([
            'titulo' => 'Programar me vuela la cabeza',
            'cuerpo' => 'Llevo como 5 días seguidos mirando videos, leyendo páginas web, a fin de realizar un blog simple en laravel, al momento tengo dos palillos en los ojos para que no se me cierren los mismos, a fin de poder escribir esta nota ;) Si lo tuviera que escribir de cero en PHP estaría una vida, gracias Google, te quiero. Hablando enserio Laravel está bueno, te hace todo, menos la comida, casi todo.',
            'idUsuario' => 1,
            'fechaHora' => now(),
        ]);

        DB::table('post')->insert([
            'titulo' => 'Tiroteo en el Villa los ñeris andan bravos',
            'cuerpo' => 'Ya van como dos noches, que sin estar escuchando música con los auriculares, se escuchan el ruido potente de los fuegos artificiales. Ah no, son la metralletas del Villa Española, deben de estar festejando un cumpleaños, que suerte que tienen, y uno acá posteando en este blog trucho.',
            'idUsuario' => 3,
            'fechaHora' => now(),
        ]);

        DB::table('publicidad')->insert([
            'nombre' => 'Coca Cola',
            'URL' => 'https://www.coca-coladeuruguay.com.uy/inicio',
            'fechaExpiracion' => '2023-12-31',
        ]);

        DB::table('publicidad')->insert([
            'nombre' => 'Subrayado Noticiero',
            'URL' => 'https://www.subrayado.com.uy/',
            'fechaExpiracion' => '2023-12-31',
        ]);

        DB::table('post_muestra_publicidad')->insert([
            'idPost' => 1,
            'idPublicidad' => 1,
        ]);

        DB::table('post_muestra_publicidad')->insert([
            'idPost' => 1,
            'idPublicidad' => 2,
        ]);

        DB::table('post_muestra_publicidad')->insert([
            'idPost' => 3,
            'idPublicidad' => 2,
        ]);

        DB::table('usuario_califica_post')->insert([
            'idUsuario' => 3,
            'idPost' => 1,
            'puntuacion' => 8,
            'fecha' => now(),
        ]);

        DB::table('usuario_califica_post')->insert([
            'idUsuario' => 2,
            'idPost' => 1,
            'puntuacion' => 7,
            'fecha' => now(),
        ]);

        DB::table('usuario_califica_post')->insert([
            'idUsuario' => 1,
            'idPost' => 2,
            'puntuacion' => 9,
            'fecha' => now(),
        ]);

        DB::table('usuario_califica_post')->insert([
            'idUsuario' => 3,
            'idPost' => 2,
            'puntuacion' => 10,
            'fecha' => now(),
        ]);

        DB::table('usuario_califica_post')->insert([
            'idUsuario' => 3,
            'idPost' => 3,
            'puntuacion' => 1,
            'fecha' => now(),
        ]);

        DB::table('usuario_califica_post')->insert([
            'idUsuario' => 2,
            'idPost' => 3,
            'puntuacion' => 5,
            'fecha' => now(),
        ]);

        DB::table('historial')->insert([
            'fechaHoraCambio' => now(),
            'idPost' => 1,
            'idUsuario' => 1,
        ]);

        DB::table('historial')->insert([
            'fechaHoraCambio' => now(),
            'idPost' => 1,
            'idUsuario' => 1,
        ]);

        DB::table('historial')->insert([
            'fechaHoraCambio' => now(),
            'idPost' => 2,
            'idUsuario' => 2,
        ]);

        DB::table('historial')->insert([
            'fechaHoraCambio' => now(),
            'idPost' => 3,
            'idUsuario' => 3,
        ]);

        DB::table('historial')->insert([
            'fechaHoraCambio' => now(),
            'idPost' => 4,
            'idUsuario' => 1,
        ]);
    }
}
