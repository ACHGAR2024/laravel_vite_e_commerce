<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:100'],
            'pseudo' => ['nullable', 'string', 'max:100', Rule::unique('users')->ignore($this->user()->id)],
            'telephone' => ['nullable', 'string', 'max:15'],
            'adresse' => ['required', 'string', 'max:255'],
            'cp' => ['required', 'string', 'max:5'],
            'ville' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'max:2024'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'role' => ['required', Rule::in(['Administrateur', 'Client'])],
        ];
    }
}
