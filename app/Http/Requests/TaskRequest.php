<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', Rule::unique('tasks', 'name')->ignore($this->task)],
            'description' => ['required', 'string', 'max:255'],
            'completed' => ['required', 'boolean']  // Añadimos la regla de booleano para completed
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser un texto.',
            'name.max' => 'El campo nombre no debe tener más de :max caracteres.',
            'name.unique' => 'El nombre de la tarea ya está en uso.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.string' => 'El campo descripción debe ser un texto.',
            'description.max' => 'El campo descripción no debe tener más de :max caracteres.',
            'completed.required' => 'El campo completado es obligatorio.',


        ];
    }
}
