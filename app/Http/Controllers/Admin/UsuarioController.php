<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Rol;
use App\Models\Seguridad\Usuario;
use App\Http\Requests\ValidacionUsuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = Usuario::with('roles')->orderBy('id')->get();
        // dd($usuarios);
        return view('admin.usuario.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Rol::orderBy('id')->pluck('nombre','id')->toArray();
        return view('admin.usuario.crear',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionUsuario $request)
    {

        // $request->password = bcrypt($request->password);

        // dd($request->all());
        // // dd($request->password);
        Usuario::create([
            "usuario" => $request->usuario,
            "nombre" => $request->nombre,
            "password" => bcrypt($request->password),
            "email" => $request->email
        ]);
       

        return redirect()->route('usuario')
                        ->with('mensaje','El usuario se agrego correctamente');

        
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
        $usuario = Usuario::findOrFail($id);
        $roles = Rol::orderBy('id')->pluck('nombre','id')->toArray();
        return view('admin.usuario.editar',compact('usuario','roles'));
 
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
        //array_filter => eliminar los campos vacios
        //esto es para cuando el usuario no quiera cambiar su contraseña 
        //no la cambie en la base de datos
        $usuario = Usuario::findOrFail($id);
        $usuario->update(array_filter($request->all()));
        // Actualiza y agrega registros en la tabla pivot
        $usuario->roles()->sync($request->rol_id);

        return redirect()->route('usuario')
                        ->with('mensaje','El usuario se editó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //

        if($request->ajax()){

            $usuario = Usuario::findOrFail($id);
            //si no le pasamos nada elimina todos los roles
            $usuario->roles()->detach(); 

            if($usuario->destroy($id)){
                return response()->json(['mensaje'=>'ok']);
            }else{
                
                return response()->json(['mensaje'=>'ng']);
            }
        }else{
            abort(404);
        }

    }
}
