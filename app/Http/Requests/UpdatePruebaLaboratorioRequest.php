<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePruebaLaboratorioRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:255', Rule::unique('pruebas_laboratorio', 'nombre')->ignore($this->route('pruebas_laboratorio'))],
            'descripcion' => ['nullable','string', 'max:510'],
        ];
    }
}
