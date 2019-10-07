<?php

use App\Models\Admin\Permiso;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;


if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}

if (!function_exists('can')) {
    function can($permiso,$redirect=true)
    {
       if(session()->get('rol_nombre')=='Administrador'){

        return true;

       }else{

            $rolId = session()->get('rol_id');

            // $permisos = cache()->tags('Permiso')->remeberForever("Permiso.rolid.{$rolId}",function(){
            //     return Permiso::whereHas('roles',function($query){
            //         $query->where('rol_id',session()->get('rol_id'));
            //     })->get()->pluck('slug')->toArray();
            // });

            //GUARDA TODOS LOS PERMISOS DEPENDIENDO DEL ROL
            $permisos = Cache::rememberForever("Permiso.rolid.{$rolId}",function(){
                return Permiso::whereHas('roles',function($query){
                    $query->where('rol_id',session()->get('rol_id'));
                })->get()->pluck('slug')->toArray();
            });
            $permisos = Permiso::whereHas('roles',function($query){
                        $query->where('rol_id',session()->get('rol_id'));
                    })->get()->pluck('slug')->toArray();

            // dd($permisos);

            if(!in_array($permiso,$permisos)){
                if($redirect){
                    if(!request()->ajax())
                        return redirect()->route('inicio')
                                        ->with('mensaje','No tienes permiso para entrar a este modulo')
                                        ->send();
                    abort(403,'No tiene Permiso para entrar a este modulo');
                }else{
                    return false;
                }
            }


            return true;

       }
    }
}