<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarCampoURL;

class ValidacionMenu extends FormRequest
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
        return [
            //
            'nombre' =>'required|max:50|unique:menu,nombre,'. $this->route('id'),
            'url' =>['required','max:50',new ValidarCampoURL],
            'icono' =>'nullable|max:50',
        ];
    }

    // public function messages()
    // {
    //     return [

    //         'nombre.required' => 'El campo nombre es requerido',
    //         'url.required' => 'El campo url es requerido',
    //     ];
    // }
}
