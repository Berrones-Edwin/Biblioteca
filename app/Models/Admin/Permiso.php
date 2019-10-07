<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //Decirle a laravel que nuestra tabla se llama permiso y esta en singular
    protected $table ="permiso"; 
    protected $fillable=['nombre','slug'];

    public function roles(){

        return $this->belongsToMany(Rol::class,'permiso_rol');
    }

}
