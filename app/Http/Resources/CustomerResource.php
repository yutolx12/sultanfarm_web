<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_customer' => $this->nama_customer,
            'email' => $this->email,
            'no_telpon' => $this->no_telp,
            'alamat' => $this->alamat,
            'password' => $this->password,
        ];
    }
}
