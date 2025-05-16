<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'identificacion' => ['required', 'string', 'max:15', 'unique:clientes'],
                'nombres' => ['required', 'string', 'max:45'],
                'apellidos' => ['required', 'string', 'max:45'],
                'celular' => ['required', 'string', 'max:15'],
                'correo' => ['required', 'string', 'email', 'max:100'],
                'habeas_data' => ['required', 'boolean'],
                'municipio_id' => ['required', 'numeric']
        ];
    }
}
