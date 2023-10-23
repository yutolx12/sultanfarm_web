<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BobotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'bobot' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'gambar.required' => 'Bobot Harus Diisi',
        ];
    }
}
