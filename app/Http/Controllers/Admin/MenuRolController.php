<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Rol;
use App\Models\Admin\Menu;
use App\Models\Admin\MenuRol;

class MenuRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //Pluck => crear un array asociativo
        //con los campos que le digamos
        //en este caso es con el nombre
        //[1=> nombre,2=>nombre,3=>nombre]

        $rols = Rol::orderBy('id')->pluck('nombre','id')
                                    ->toArray();

        $menus = Menu::getMenu();
        $menusRols = Menu::with('roles')->get()
                                        ->pluck('roles','id')
                                        ->toArray();
        // dd($menusRols);

        return View('admin.menu-rol.index',compact('rols','menus','menusRols'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if($request->ajax()){
            
            $menus = new Menu();
            
            if($request->input('estado')==1){

                $menus->find($request->input('menu_id'))
                    ->roles()
                    ->attach($request->input('rol_id'));

                return response()->json(['respuesta' => $request->input('estado')]);

            }else{
                    
                $menus->find($request->input('menu_id'))
                    ->roles()
                    ->detach($request->input('rol_id'));

                    return response()->json(['respuesta' => $request->input('estado')]);
            }
        }else{
            abort(404);
        }
    }

   
}
