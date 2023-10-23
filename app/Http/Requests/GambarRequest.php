<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GambarRequest extends FormRequest
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
            'gambar' => 'required|image|mimes: jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'gambar.required' => 'Pilih Gambar',
            'gambar.mimes' => 'Format Gambar Harus jpeg,png,jpg,gif,svg',
            'gambar.max' => 'Ukuran Gambar Maksimal 2 Mb',
        ];
    }
}
