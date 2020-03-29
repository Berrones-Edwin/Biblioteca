<?php

use Illuminate\Database\Seeder;
use App\Models\Seguridad\Usuario;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = Usuario::create([
            'usuario' => 'admin',
            'password' => bcrypt('password'),
            'nombre' => 'Jose Perez Leon',
            'email' => "admin@gmail.com"
        ]);
        Usuario::create([
            'usuario' => 'rat',
            'password' => bcrypt('password'),
            'nombre' => 'Ernesto Castro',
            'email' => "rat@gmail.com"
        ]);

        $usuario->roles()->sync(1);

    }
}
