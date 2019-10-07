<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
     /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')
             ->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('seguridad.index');
    }

  
    // Metodo que se ejecuta despues de loguearse un usuario
    protected function authenticated (Request $request,$user)
    {
        $roles= $user->roles()->where('estado',1)->get();
        if( $roles->isNotEmpty() ){

            // El Metodo setSession esta en el model Usuario
            // Sirve para almacenar datos del usuario
            $user->setSession($roles->toArray()); //Crear Sesión

        }else{

            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect()->route('login')->withErrors(['Error'=>'Este usuario no tiene un  rol activo.']);
        }
    }

    // le decimos a Laravel que tome el campo usuario de la tabla Usuario
    public function username()
    {
        return 'usuario';
    }

  
  

  
}
