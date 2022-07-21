<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'title' => 'required|min:3',
            'start' => 'date_format:H:i:s|before:end',
            'end' => 'date_format:H:i:s|after:start',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Inserte Titulo del evento',
            'title.min' => 'El Título de el Evento debe tener almenos 03 caracteres!',
            'start.date_format' => 'Ingresa en Hora Inicial un valor válido!',
            'start.before' => 'La Hora Inicial debe ser menor que la Hora Final!',
            'end.date_format' => 'Ingresa en Hora Final un valor válido!',
            'end.after' => 'La Hora Final debe ser mayor que la Hora Inicial!',
        ];
    }
}
