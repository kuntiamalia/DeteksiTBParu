<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPerhitungan extends Model
{
    use HasFactory;

    protected $table = 'history_deteksi';

    protected $fillable = [
        'nama_pasien',
        'jenis_kelamin',
        'usia',
        'hasil',
        'berat_badan',
        'demam',
        'malaise',
        'keringat_malam',
        'nyeri_dada',
        'nafsu_makan',
        'sesak_nafas',
        'batuk',
        'id_akun',
    ];
}
