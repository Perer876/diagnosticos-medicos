<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEspecialidadRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('especialidades', 'nombre')->ignore($this->route('especialidad'))
            ],
            'descripcion' => ['required', 'string', 'max:1020'],
        ];
    }
}
