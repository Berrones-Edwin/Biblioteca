<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Menu;
use App\Http\Requests\ValidacionMenu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = Menu::getMenu();
        // dd($menu);
        return View('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('admin.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Es como si fuera la misma clase Request pero 
    //tambien extiende las validaciones de la clase ValidacionMenu
    public function store(ValidacionMenu $request)
    {
        
        Menu::create($request->all());

        return redirect('admin/menu/crear')->with('mensaje','Menú guardado satisfactoriamente');
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
        $menu = Menu::findOrFail($id);
        return View('admin.menu.editar',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionMenu $request, $id)
    {
        //
        Menu::findOrFail($id)->update($request->all());
        return redirect()->route('menu')->with('mensaje','El menu se actualizo correctamente');
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
       Menu::destroy($id);
        return redirect()->route('menu')->with('mensaje','El menu se elimino correctamente');
    }

    public function guardarOrden(Request $request){

        if($request->ajax()){

            $menu= new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ok']);
            
        }else{
            abort(404);
        }
    }
}
