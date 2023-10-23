<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePegawaiRequest extends FormRequest
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
            'nip' => 'required',
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nip' => 'NIP Tidak Boleh Kosong',
            'name' => 'Nama Tidak Boleh Kosong',
            'jenis_kelamin' => 'Pilih Jenis Kelamin',
            'alamat' => 'Alamat Tidak Boleh Kosong',
            'no_telp' => 'No Telp Tidak Boleh Kosong',
            'email' => 'Email Tidak Boleh Kosong',
            'password' => 'Password Tidak Boleh Kosong',
            'role' => 'Pilih Role',
        ];
    }
}
