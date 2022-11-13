<?php

namespace App\Http\Requests;

use App\Rules\EsMedico;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest
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
            'fecha' => ['required', 'date', 'after_or_equal:' . Carbon::now()->format('Y-m-d')],
            'hora' => ['required', 'date_format:H:i'],
            'motivo' => ['nullable', 'string', 'max:255'],
            'user_id' => ['required', 'numeric', new EsMedico()],
        ];
    }
}
