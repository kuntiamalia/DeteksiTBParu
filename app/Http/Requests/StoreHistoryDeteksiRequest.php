<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHistoryDeteksiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'usia' => 'required|integer|min:13',
            'hasil' => 'required|string|max:255',
            'berat_badan' => 'required|in:Yes,No',
            'demam' => 'required|in:Yes,No',
            'malaise' => 'required|in:Yes,No',
            'keringat_malam' => 'required|in:Yes,No',
            'nyeri_dada' => 'required|in:Yes,No',
            'nafsu_makan' => 'required|in:Yes,No',
            'sesak_nafas' => 'required|in:Yes,No',
            'batuk' => 'required|in:Yes,No',
            'id_akun' => 'required|exists:users,id', // assuming you have a users table
        ];
    }
}

