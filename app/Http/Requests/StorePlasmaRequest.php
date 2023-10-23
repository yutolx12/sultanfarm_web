<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlasmaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_plasma' => 'required',
            'alamat_plasma' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_plasma' => 'Nama Plasma Tidak boleh kosong',
            'alamat_plasma' => 'Alamat Plasma Tidak boleh Kosong',
        ];
    }
}
