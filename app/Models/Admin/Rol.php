<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    
    protected $table="rol"; //nombre de la tabla en la base de datos
    protected $fillable =["nombre"]; //permitir que se agreguen de forma masiva
}
