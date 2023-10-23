<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBreedingRequest extends FormRequest
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
            'nama_paket' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'gambar.required' => 'Gambar Tidak Boleh Kosong',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif, svg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'nama_paket' => 'Field Tidak Boleh kosong',
            'harga' => 'Field Tidak Boleh kosong',
            'keterangan' => 'Field Tidak Boleh kosong',
        ];
    }
}
