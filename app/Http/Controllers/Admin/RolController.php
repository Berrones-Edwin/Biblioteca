<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Rol;
use App\Http\Requests\ValidacionRol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Rol::all();

        // dd($roles);
        return View('admin.rol.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('admin.rol.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionRol $request)
    {
        //
        $rol = Rol::create($request->all());

        return redirect()->route('rol')
                        ->with('mensaje','El rol se agrego correctamente');

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
        // dd($id);
        $rol = Rol::FindOrFail($id);
        // dd($rol->nombre);
        return View('admin.rol.editar',compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionRol $request, $id)
    {
        //
        $rol=Rol::FindOrFail($id)
                    ->update($request->all());

        return redirect()->route('rol')
                        ->with('mensaje','El rol se editó correctamente');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        if($request->ajax()){
            if(Rol::destroy($id)){
                return response()->json(['mensaje'=>'ok']);
            }else{
                
                return response()->json(['mensaje'=>'ng']);
            }
        }else{
            abort(404);
        }

    }
}
