<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            // 'rol',
            // 'permiso'
            'usuario',
            'usuario_rol'
        ]);
        $this->call(UsuarioAdministrador::class);
        // $this->call(RolTableSeeder::class);
        // $this->call(PermisoTableSeeder::class);
    }

    protected function truncateTablas(array $tablas){

        //NO HACERLO EN PRODUCCION
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
