<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ajusta según tus políticas de autorización
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:usuarios,email'],
            'contraseña' => ['required', 'min:8'],
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['nullable', 'string', 'max:100'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'direccion' => ['nullable', 'string'],
            'rol_id' => ['required', 'exists:roles,id']
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'contraseña.min' => 'La contraseña debe tener al menos 8 caracteres.'
        ];
    }
}