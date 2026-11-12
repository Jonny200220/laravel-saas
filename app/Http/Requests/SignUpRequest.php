<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El Nombre es Obligatorio',
            'email.required' => 'El E-mail es Obligatorio',
            'email.email' => 'El E-mail no es Válido',
            'email.unique' => 'El E-mail ya está en uso',
            
            'password.required' => 'La Contraseña es Obligatoria',
            'password.min' => 'La Contraseña debe tener al menos :min caracteres',
            'password.confirmed' => 'La Contraseña no coincide',
            'password.letters' => 'La Contraseña debe tener al menos una letra',
            'password.symbols' => 'La Contraseña debe tener al menos un caracter especial',
            'password.mixedCase' => 'La Contraseña debe tener al menos una letra mayúscula y una letra minúscula',
            'password.numbers' => 'La Contraseña debe tener al menos un número',
            'password.uncompromised' => 'La Contraseña no debe ser fácil de adivinar',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed',
            Password::min(8)
            ->letters()
            ->mixedCase()
            ->symbols()
            ->numbers()
            ->uncompromised()
            ],
        ];
    }
}
