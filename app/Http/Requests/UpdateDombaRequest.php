<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDombaRequest extends FormRequest
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
            'jenis_kelamin' => 'required',
            'id_jenis' => 'required',
            'tgl_lahir' => 'required',
            'bobot' => 'required',
            'harga_jual' => 'required',
            'induk_jantan' => 'required',
            'induk_betina' => 'required',
            'tipe_domba' => 'required',
            'turunan' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'jenis_kelamin' => 'Pilih Jenis Kelamin',
            'id_jenis' => 'Pilih Jenis Domba',
            'tgl_lahir' => 'Tgl Lahir Tidak Boleh Kosong',
            'bobot' => 'Bobot Tidak Boleh Kosong',
            'harga_jual' => 'Harga Tidak Boleh Kosong',
            'induk_jantan' => 'Pilih Induk Jantan',
            'induk_betina' => 'Pilih Induk Betina',
            'tipe_domba' => 'Pilih Tipe Domba',
            'turunan' => 'Turunan Tidak Boleh Kosong',
            'keterangan' => 'Keterangan Tidak Boleh Kosong',
        ];
    }
}
