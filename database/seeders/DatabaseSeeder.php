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
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi. Etiam id nibh posuere mauris pretium sollicitudin nec nec enim. Integer laoreet pharetra arcu, et pretium massa consequat ut. ',
            'fechaHora' => now(),
            'idUsuario' => 1,
        ]);

        DB::table('post')->insert([
            'titulo' => 'Uruguay Campeón',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi. Etiam id nibh posuere mauris pretium sollicitudin nec nec enim. Integer laoreet pharetra arcu, et pretium massa consequat ut. ',
            'fechaHora' => now(),
            'idUsuario' => 2,
        ]);

        DB::table('post')->insert([
            'titulo' => 'Guerra de Pedos',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi. Etiam id nibh posuere mauris pretium sollicitudin nec nec enim. Integer laoreet pharetra arcu, et pretium massa consequat ut. ',
            'fechaHora' => now(),
            'idUsuario' => 3,
        ]);

        DB::table('post')->insert([
            'titulo' => 'Resumen de la película los Tomates Asesinos',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi. Etiam id nibh posuere mauris pretium sollicitudin nec nec enim. Integer laoreet pharetra arcu, et pretium massa consequat ut. ',
            'fechaHora' => now(),
            'idUsuario' => 1,
        ]);

        DB::table('post')->insert([
            'titulo' => 'Como hacer barquitos de papel',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi. Etiam id nibh posuere mauris pretium sollicitudin nec nec enim. Integer laoreet pharetra arcu, et pretium massa consequat ut. ',
            'fechaHora' => now(),
            'idUsuario' => 2,
        ]);

        DB::table('post')->insert([
            'titulo' => 'Programar me vuela la cabeza',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi. Etiam id nibh posuere mauris pretium sollicitudin nec nec enim. Integer laoreet pharetra arcu, et pretium massa consequat ut. ',
            'fechaHora' => now(),
            'idUsuario' => 3,
        ]);

        DB::table('post')->insert([
            'titulo' => 'Tiroteo en el Villa los ñeris andan bravos',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper odio quis lacus fermentum, id efficitur ipsum placerat. Etiam orci urna, tempor ut elit vitae, posuere pharetra eros. Vivamus enim lorem, ornare non iaculis eu, tempus sit amet urna. Sed eu massa vel enim vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu rhoncus quam. Mauris sed consequat mi. Etiam id nibh posuere mauris pretium sollicitudin nec nec enim. Integer laoreet pharetra arcu, et pretium massa consequat ut. ',
            'fechaHora' => now(),
            'idUsuario' => 1,
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

        DB::table('postMuestraPublicidad')->insert([
            'idPost' => 1,
            'idPublicidad' => 1,
        ]);

        DB::table('postMuestraPublicidad')->insert([
            'idPost' => 1,
            'idPublicidad' => 2,
        ]);

        DB::table('postMuestraPublicidad')->insert([
            'idPost' => 3,
            'idPublicidad' => 2,
        ]);

        DB::table('usuarioCalificaPost')->insert([
            'idUsuario' => 3,
            'idPost' => 1,
            'puntuacion' => 8,
            'fecha' => now(),
        ]);

        DB::table('usuarioCalificaPost')->insert([
            'idUsuario' => 3,
            'idPost' => 2,
            'puntuacion' => 10,
            'fecha' => now(),
        ]);

        DB::table('usuarioCalificaPost')->insert([
            'idUsuario' => 1,
            'idPost' => 3,
            'puntuacion' => 9,
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
