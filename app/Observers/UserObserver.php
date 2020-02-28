<?php

namespace App\Observers;

use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;

class UserObserver
{

    protected $request;

    public function __construct(Request $request) {

        $this->request = $request;
    }

    /**
     * Handle the usuario "created" event.
     *
     * @param  \App\Models\Seguridad\Usuario  $usuario
     * @return void
     */
    public function created(Usuario $usuario)
    {
        //
        $usuario->roles()->attach($this->request->rol_id);
    }

    /**
     * Handle the usuario "updated" event.
     *
     * @param  \App\Models\Seguridad\Usuario  $usuario
     * @return void
     */
    public function updated(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the usuario "deleted" event.
     *
     * @param  \App\Models\Seguridad\Usuario  $usuario
     * @return void
     */
    public function deleted(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the usuario "restored" event.
     *
     * @param  \App\Models\Seguridad\Usuario  $usuario
     * @return void
     */
    public function restored(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the usuario "force deleted" event.
     *
     * @param  \App\Models\Seguridad\Usuario  $usuario
     * @return void
     */
    public function forceDeleted(Usuario $usuario)
    {
        //
    }
}
