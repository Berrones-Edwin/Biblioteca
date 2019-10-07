<?php

use Illuminate\Database\Seeder;

use App\Models\Permiso;

class PermisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Permiso::class)->create(); //1 registro
        factory(Permiso::class,50)->create(); //50 registros
    }
}
