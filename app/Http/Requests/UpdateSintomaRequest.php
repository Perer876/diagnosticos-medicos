<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSintomaRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:255', Rule::unique('sintomas', 'nombre')->ignore($this->route('sintoma'))],
            'descripcion' => ['nullable','string', 'max:510'],
        ];
    }
}
