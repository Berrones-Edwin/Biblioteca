<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Guest\Libro;

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
        can('lista-libros');

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
    public function store(Request $request)
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
        //
        // return view();
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
        $libro = Libro::findOrFail($id);
        return view('guest.libro.editar',compact('libro'));
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
        
        $libro= Libro::findOrFail($id);

        if($foto = Libro::setCaratula($request->foto_up,$libro->foto))
            $request->request->add(['foto' => $foto]);

        $libro->update($request->all());
        return redirect()->route('libro')->with('mensaje','El libro se editó correctamente');

        // dd($request->all());
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
                return response()->json(['mensaje'=>'ok']);
            }else{
                
                return response()->json(['mensaje'=>'ng']);
            }
        }else{
            abort(404);
        }
    }
}
