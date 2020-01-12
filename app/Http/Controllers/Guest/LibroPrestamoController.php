<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Guest\LibroPrestamo;
use App\Models\Guest\Libro;

class LibroPrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $libros = LibroPrestamo::with('usuario:id,nombre','libro')->orderBy('created_at')->get();
        return view('guest.libro_prestamo.index',compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //select `libro`.*, (select count(*) from `libro_prestamo` where `libro`.`id` = `libro_prestamo`.`libro_id` and `fecha_devolucion` is null) as `prestamos_count` from `libro`
        $libros = Libro::withCount(['prestamos'=> function(Builder $query){

            $query->whereNull('fecha_devolucion');

        }])->get()->filter(function($item,$key){

            //regresamos solo los que no estan prestamos
            return $item->cantidad > $item->prestamo_count;

        })->pluck('titulo','id');

        return view('guest.libro_prestamo.crear',compact('libros'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
