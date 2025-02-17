<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'nombres' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'pais_id' => ['required', 'exists:paises,id'],
            'estado_id' => ['required', 'exists:estados,id'],
            'alias' => ['required', 'string', 'max:255', Rule::unique('users', 'alias')->ignore($this->route('user'))],
            'password' => ['nullable', Password::min(8)],
            'rol_id' => ['required', 'exists:roles,id'],
        ];
    }
}
