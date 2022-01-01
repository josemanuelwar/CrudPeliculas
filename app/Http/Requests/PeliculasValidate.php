<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculasValidate extends FormRequest
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
            'nombre_pelicula'=>'required',
            'descripcion_pelicula'=>'required',
            'tipo_pelicula'=>'required',
            'fecha_estreno_pelicula'=>'required',
            'precio_pelicula'=>'required'
        ];
    }
}
