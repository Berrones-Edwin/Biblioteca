<?php

use Illuminate\Database\Seeder;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('usuario')->insert([
            'usuario' => 'admin',
            'password' => bcrypt('password'),
            'nombre' => 'Jose Perez Leon',
        ]);
        DB::table('usuario')->insert([
            'usuario' => 'rat',
            'password' => bcrypt('password'),
            'nombre' => 'Ernesto Castro',
        ]);

        DB::table('usuario_rol')->insert([
            'estado' => 1,
            'rol_id' => 1,
            'usuario_id' => 1
        ]);
        DB::table('usuario_rol')->insert([
            'estado' => 1,
            'rol_id' => 2,
            'usuario_id' => 2
        ]);
    }
}
