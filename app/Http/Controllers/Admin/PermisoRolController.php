<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

use App\Models\Admin\Rol;
use App\Models\Admin\Permiso;
use App\Models\Admin\PermisoRol;



class PermisoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $rols = Rol::orderBy('id')->pluck('nombre','id')->toArray();
        $permisos = Permiso::get();
        $permisosRols = Permiso::with('roles')->get()->pluck('roles','id')->toArray();

        // dd($permisosRols);

        return view('admin.permiso-rol.index',compact('rols','permisos','permisosRols'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->ajax()){
            Cache::flush(); //borrar toda la cache
            $permisos = new Permiso();
            
            if($request->input('estado')==1){

                
                $permisos->find($request->input('permiso_id'))
                         ->roles()
                         ->attach($request->input('rol_id'),['estado'=>1]);
                         

                return response()->json(['respuesta'=>'1']);
            }else{
               
                $permisos->find($request->input('permiso_id'))
                        ->roles()
                        ->detach($request->input('rol_id'),['estado'=>0]);

                return response()->json(['respuesta'=>'0']);

            }
        }else{
            abort(404);
        }
    }

  
}
