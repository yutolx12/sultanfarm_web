<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBreedingRequest extends FormRequest
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
            'nama_paket' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_paket' => 'Field Tidak Boleh kosong',
            'harga' => 'Field Tidak Boleh kosong',
            'keterangan' => 'Field Tidak Boleh kosong',
        ];
    }
}
