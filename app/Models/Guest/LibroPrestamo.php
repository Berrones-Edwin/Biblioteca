<?php

namespace App\Models\Guest;

use Illuminate\Database\Eloquent\Model;

use App\Models\Seguridad\Usuario;

class LibroPrestamo extends Model
{
    //
    protected $table="libro_prestamo";

    protected $fillable =[

        "usuario_id","libro_id","fecha_prestamo","prestado_a","fecha_devolucion"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,"usuario_id");
    }
    
    public function libro()
    {
        # code...
        return $this->belongsTo(Libro::class,"libro_id");
    }

}
