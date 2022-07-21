<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
            //aca van todas las reglas
            'title' => 'required|min:3',
            'start' => 'date_format:Y-m-d H:i:s|before:end',
            'end' => 'date_format:Y-m-d H:i:s|after:start',
        ];
    }
    public function messages(){
        return [
            'title.required' => 'Llenar el campo titulo',
            'title.min' => 'El titulo necesita almenos 3 caracteres',
            'start.date_format' => 'Inserta una fecha Inicial con valor válido!',
            'start.before' => 'La fecha/Hora Inicial debe ser menor que la Fecha Final!',
            'end.date_format' => 'Inserta la Fecha Final con valor válido!',
            'end.after' => 'La Fecha/Hora Final debe ser mayor que la fecha Inicial!',
        ];
    }
}
