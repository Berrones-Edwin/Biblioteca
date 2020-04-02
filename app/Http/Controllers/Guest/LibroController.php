<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Models\Guest\Libro;
use App\Http\Requests\ValidacionLibro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(auth()->user());
        // dd(session()->all());
        
        // dd(cache()->get('Permiso.rolid.2'));
        // dd(auth()->user());
        can('listar-libros');

        $libros = Libro::orderBy('id')->get();

        return view('guest.libro.index',compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guest.libro.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionLibro $request)
    {
        if($foto = Libro::setCaratula($request->foto_up))
            $request->request->add(['foto' => $foto]);
        Libro::create($request->all());
        return redirect()->route('libro')->with('mensaje','El libro se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('guest.libro.show',compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {

        // dd($libro);
        return view('guest.libro.editar',compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionLibro $request, Libro $libro)
    {
        if($foto = Libro::setCaratula($request->foto_up,$libro->foto))
            $request->request->add(['foto' => $foto]);

        $libro->update($request->all());
        return redirect()->route('libro')->with('mensaje','El libro se editó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
        if($request->ajax()){

            $libro = Libro::findOrFail($id);
            if($libro->destroy($id)){
                Storage::disk('public')->delete("imagenes/caratulas/{$libro->foto}");
                return response()->json(['mensaje'=>'ok']);
            }else{
                
                return response()->json(['mensaje'=>'ng']);
            }
        }else{
            abort(404);
        }
    }
}
