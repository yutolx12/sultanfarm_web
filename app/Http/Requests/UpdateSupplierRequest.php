<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama' => 'Nama Tidak Boleh Kosong',
            'no_hp' => 'No Hp Tidak Boleh Kosong',
            'alamat' => 'Alamat Tidak Boleh Kosong',
        ];
    }
}
