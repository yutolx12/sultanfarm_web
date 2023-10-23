<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJenisDombaRequest extends FormRequest
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
            'jenis_domba' => 'required',
            'kode' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'urutan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'jenis_domba.required' => 'Jenis Domba tidak Boleh Kosong',
            'kode.required' => 'Kode Tidak Boleh Kosong',
            'gambar.required' => 'Gambar Tidak Boleh Kosong',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif, svg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'urutan.required' => 'Urutan tidak boleh kosong.',
        ];
    }
}
