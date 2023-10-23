<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDombaRequest extends FormRequest
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jenis_kelamin' => 'required',
            'id_jenis' => 'required',
            'tgl_lahir' => 'required',
            'bobot' => 'required',
            'tipe_domba' => 'required',
            'turunan' => 'required',
            'harga_jual' => 'required',
            'id_kamar' => 'required',
            // 'induk_jantan' => 'required',
            // 'induk_betina' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'jenis_kelamin' => 'Pilih Jenis Kelamin',
            'id_jenis' => 'Pilih Jenis Domba',
            'tgl_lahir' => 'Tgl Lahir Tidak Boleh Kosong',
            'gambar.required' => 'Gambar Tidak Boleh Kosong',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif, svg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'bobot' => 'Bobot Tidak Boleh Kosong',
            'harga_jual' => 'Harga Tidak Boleh Kosong',
            // 'induk_jantan' => 'Pilih Induk Jantan',
            // 'induk_betina' => 'Pilih Induk Betina',
            'tipe_domba' => 'Pilih Tipe Domba',
            'turunan' => 'Turunan Tidak Boleh Kosong',
            'keterangan' => 'Keterangan Tidak Boleh Kosong',
            'id_kamar' => 'Kamar Tidak Boleh Kosong',
        ];
    }
}
