<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if( $this->route('id')){

            return [
                //EDITAR USUARIO
                'usuario' => 'required|max:50|unique:usuario,usuario,' . $this->route('id'),
                'nombre' => 'required|max:50',
                'email' => 'required|max:100|unique:usuario,email,' . $this->route('id'),
                'password' => 'nullable|min:8',
                're_password' => 'required_with:password|nullable|min:8|same:password',
                'rol_id' => 'required|array',
            ];

        }else{
            return [
                //CREAR USUARIO
                'usuario' => 'required|max:50|unique:usuario,usuario,' . $this->route('id'),
                'nombre' => 'required|max:50',
                'email' => 'required|max:100|unique:usuario,email,' . $this->route('id'),
                'password' => 'required|min:8',
                're_password' => 'required|same:password',
                'rol_id' => 'required|array',
            ];
        }
        
    }
}
