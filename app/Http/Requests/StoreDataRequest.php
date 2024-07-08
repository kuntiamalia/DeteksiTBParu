<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'usia' => 'required|integer|min:13',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ];
    }
}
