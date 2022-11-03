<?php

namespace App\Http\Requests;

use App\Enums\Sexos;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StorePacienteRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'nombres' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'sexo' => ['required', new Enum(Sexos::class)],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:now'],
            'pais_id' => ['required', 'exists:paises,id'],
            'estado_id' => ['required', 'exists:estados,id'],
            'antecedentes_familiares' => ['nullable', 'string', 'max:510']
        ];
    }
}
