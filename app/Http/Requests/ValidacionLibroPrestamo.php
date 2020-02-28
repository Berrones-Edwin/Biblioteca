<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionLibroPrestamo extends FormRequest
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
            // "usuario_id" => "required|integer", 
            "libro_id" => "required|integer", 
            "fecha_prestamo" => "required|date_format:Y-m-d", 
            "prestado_a" => "required|string",
        ];
    }
}
