<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * PREFIX
 * admin/permiso
 * admin/permiso
 * 
 * NAMESPACE
 * para indicar donde se encuentra el controlador
 */

//RESETEO DE PASSWORDS
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//  Se modifico el RouteServiceProvider y se agrego
// que todos los ID seran numericos

// Route::get('/','Seguridad\LoginController@index')->name('inicio');
Route::get('/', 'InicioController@index')->name('inicio');
Route::post('ajax-session', 'AjaxController@setSession')->name('ajax')->middleware('auth');

// REGISTRO E INICIO DE SESION
Route::group(['prefix'=>'seguridad','namespace'=>'Seguridad'],function(){
    
    Route::get('login','LoginController@index')->name('login');
    Route::post('login','LoginController@login')->name('login-post');
    Route::get('logout','LoginController@logout')->name('logout');
    
    Route::get('registro','RegistroController@showRegistrationForm')->name('register');
    Route::post('registro','RegistroController@register')->name('registro-guardar');

});


Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth', 'superadmin']],function(){

    Route::get('','AdminController@index');

    //-----------------------------
    //----------MENU---------------
    //-----------------------------
    Route::get('menu','MenuController@index')->name('menu');
    Route::get('menu/crear','MenuController@create')->name('menu-crear');
    Route::post('menu','MenuController@store')->name('menu-guardar');
    Route::post('menu/guardar-orden','MenuController@guardarOrden')->name('guardar_orden');

    Route::get('menu/{id}/editar','MenuController@edit')->name('menu-editar');
    Route::put('menu/{id}','MenuController@update')->name('menu-actualizar');

    Route::get('menu/{id}','MenuController@destroy')->name('menu-eliminar');


    //-----------------------------
    //----------ROL---------------
    //-----------------------------

    Route::get('rol','RolController@index')->name('rol'); //ver listado
    Route::get('rol/crear','RolController@create')->name('rol-crear'); //mostrar frm para crear rol
    Route::post('rol','RolController@store')->name('rol-guardar'); //Guardar Rol
    Route::get('rol/editar/{id}','RolController@edit')->name('rol-editar'); //mostrar frm para editar rol
    Route::put('rol/{id}','RolController@update')->name('rol-actualizar'); //guardar los cambios
    Route::delete('rol/{id}','RolController@destroy')->name('rol-eliminar'); //eliminar el rol


    //-----------------------------
    //----------MENU-ROL---------------
    //-----------------------------

    Route::get('menu-rol','MenuRolController@index')->name('menu-rol'); //ver listado
    Route::post('menu-rol','MenuRolController@store')->name('menu-rol-guardar'); //ver listado


    //-----------------------------
    //----------PERMISO---------------
    //-----------------------------

    Route::get('permiso','PermisoController@index')->name('permiso');

    Route::get('permiso/crear','PermisoController@create')->name('permiso-crear');
    Route::post('permiso','PermisoController@store')->name('permiso-guardar');

    Route::get('permiso/editar/{id}','PermisoController@edit')->name('permiso-editar');
    Route::put('permiso/{id}','PermisoController@update')->name('permiso-actualizar');

    Route::delete('permiso/{id}','PermisoController@destroy')->name('permiso-eliminar');

    //-----------------------------
    //----------PERMISO-ROL---------------
    //-----------------------------

    Route::get('permiso-rol','PermisoRolController@index')->name('permiso-rol');
    Route::post('permiso-rol','PermisoRolController@store')->name('permiso-rol-guardar');

    //-----------------------------
    //----------USUARIO---------------
    //-----------------------------

    Route::get('usuario','UsuarioController@index')->name('usuario');

    Route::get('usuario/crear','UsuarioController@create')->name('usuario-crear');
    Route::post('usuario','UsuarioController@store')->name('usuario-guardar');

    Route::get('usuario/editar/{id}','UsuarioController@edit')->name('usuario-editar');
    Route::put('usuario/{id}','UsuarioController@update')->name('usuario-actualizar');

    Route::delete('usuario/{id}','UsuarioController@destroy')->name('usuario-eliminar');

});


Route::group(['namespace'=>'Guest'],function(){
    
    Route::get('libro','LibroController@index')->name('libro');
    
    Route::get('libro/crear','LibroController@create')->name('libro-crear');
    Route::post('libro','LibroController@store')->name('libro-guardar');

    Route::post('libro/detalles/{libro}','LibroController@show')->name('libro-detalles');
    
    Route::get('libro/editar/{libro}','LibroController@edit')->name('libro-editar');
    Route::put('libro/{libro}','LibroController@update')->name('libro-actualizar');
    
    Route::delete('libro/{libro}','LibroController@destroy')->name('libro-eliminar');

    Route::get('libro-prestamo','LibroPrestamoController@index')->name('libroPrestamo.index');
});



