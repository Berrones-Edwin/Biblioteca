<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;


class Usuario extends Authenticatable  
{
    //
    use Notifiable;

    protected $remember_token=false;
    protected $table ="usuario";
    // Introducir campos de manera masiva
    protected $fillable =["usuario","nombre","password","email"];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Rol','usuario_rol');
    }

    public function setSession($roles)
    {
        Session::put([
            'usuario' => $this->usuario,
            'usuario_id'=>$this->id,
            'nombre_usuario' => $this->nombre
        ]);

        if(count($roles)==1)
        {
            Session::put([
                'rol_id' => $roles[0]['id'],
                'rol_nombre' => $roles[0]['nombre']
                
            ]);
            
        }
        else
        {   
            Session::put('roles',$roles);
        }
        
    }

    /**
     * Get the user's password.
     *
     * @param  string  $value
     * @return string
     */
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }

}
