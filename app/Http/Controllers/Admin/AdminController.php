<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Models\Seguridad\Usuario;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $flag=false;
        // if(auth()->user()){
        //     $flag=true;
        // }
        // dd($flag);
        // $usuario = Usuario::findOrFail(auth()->user()->id);
        
        // dd($usuario->roles());
        // dd(session()->all());
        return View('admin.admin.index');
    }

   
}
