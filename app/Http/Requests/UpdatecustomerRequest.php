<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatecustomerRequest extends FormRequest
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
            'nama_customer' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'string',
            'min:8',
            'confirmed',
        ];
    }

    public function messages()
    {
        return [
            'nama_customer' => 'Field Tidak Boleh Kosong',
            'alamat' => 'Field Tidak Boleh Kosong',
            'no_telp' => 'Field Tidak Boleh Kosong',
            'email' => 'Field Tidak Boleh Kosong',
            'password' => 'Field Tidak Boleh Kosong',
        ];
    }
}
