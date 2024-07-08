<?php

namespace App\Http\Controllers;

use App\Models\HistoryPerhitungan;
use Illuminate\Http\Request;

class DeteksiController extends Controller
{
    public function index()
    {
        return view('deteksi.index');
    }
    public function diagnosa(Request $request)
    {
        $nama = $request->input('nama');
        $usia = $request->input('usia');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $BB_Turun = $request->input('berat_badan');
        $Demam = $request->input('demam');
        $Malaise = $request->input('malaise');
        $Keringat_malam_hari = $request->input('keringat_malam');
        $Nyeri_dada_ulu_hati = $request->input('nyeri_dada');
        $Nafsu_makan_turun = $request->input('nafsu_makan');
        $Sesak_nafas = $request->input('sesak_nafas');
        $Batuk = $request->input('batuk');
        
        // dd($request->all());

        
        if ($BB_Turun == 'no' && $Batuk == 'no'){
            $diagnosis = 'Non TB Paru';
        } elseif ($BB_Turun == 'no' && $Batuk == 'yes' && $Keringat_malam_hari == 'no' && $Malaise == 'no') {
            if ($Sesak_nafas == 'no') {
                $diagnosis = 'TB Paru';
            }
            elseif ($Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'no' && $Nyeri_dada_ulu_hati == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'no' && $Nyeri_dada_ulu_hati == 'yes' && $Demam == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'no' && $Nyeri_dada_ulu_hati == 'yes' && $Demam == 'yes'){
                $diagnosis = 'TB Paru';
            } elseif ($Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'yes' && $Nyeri_dada_ulu_hati == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'yes' && $Nyeri_dada_ulu_hati == 'yes'){
                $diagnosis = 'TB Paru';
            }
        } elseif ($BB_Turun == 'no' && $Batuk == 'yes' && $Keringat_malam_hari == 'no' && $Malaise == 'yes'){
            if ($Demam == 'no' && $Nyeri_dada_ulu_hati == 'no' && $Nafsu_makan_turun == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Demam == 'no' && $Nyeri_dada_ulu_hati == 'no' && $Nafsu_makan_turun == 'yes'){
                $diagnosis = 'TB Paru';
            } elseif ($Demam == 'no' && $Nyeri_dada_ulu_hati == 'yes' && $Nafsu_makan_turun == 'no'){
                $diagnosis = 'Non TB Paru';
            } elseif ($Demam == 'no' && $Nyeri_dada_ulu_hati == 'yes' && $Nafsu_makan_turun == 'yes'){
                $diagnosis = 'TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'no' && $Nyeri_dada_ulu_hati == 'no'){
                $diagnosis = 'Non TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'no' && $Nyeri_dada_ulu_hati == 'yes' && $Nafsu_makan_turun == 'no'){
                $diagnosis = 'Non TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'no' && $Nyeri_dada_ulu_hati == 'yes' && $Nafsu_makan_turun == 'yes'){
                $diagnosis = 'Non TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'no' && $Nyeri_dada_ulu_hati == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'no' && $Nyeri_dada_ulu_hati == 'yes'){
                $diagnosis = 'TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'yes' && $Nyeri_dada_ulu_hati == 'no'){
                $diagnosis = 'Non TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'yes' && $Nafsu_makan_turun == 'yes' && $Nyeri_dada_ulu_hati == 'yes'){
                $diagnosis = 'Non TB Paru';
            }
        } elseif ($BB_Turun == 'no' && $Batuk == 'yes' && $Keringat_malam_hari == 'yes'){
            if ($Demam == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Demam == 'yes' && $Sesak_nafas == 'yes'){
                $diagnosis = 'TB Paru';
            }
        } elseif ($BB_Turun == 'yes' && $Demam == 'no'){
            if ($Nyeri_dada_ulu_hati == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Nyeri_dada_ulu_hati == 'yes' && $Malaise == 'no' && $Keringat_malam_hari == 'no'){
                $diagnosis = 'TB Paru';
            } elseif ($Nyeri_dada_ulu_hati == 'yes' && $Malaise == 'no' && $Keringat_malam_hari == 'yes'){
                $diagnosis = 'TB Paru';
            } elseif ($Nyeri_dada_ulu_hati == 'yes' && $Malaise == 'yes'){
                $diagnosis = 'Non TB Paru';
            }
        } elseif ($BB_Turun == 'yes' && $Demam == 'yes'){
            $diagnosis = 'TB Paru';
        } else {
            $diagnosis = 'TB Paru';
        }


        // dd($diagnosis);
        $request->session()->put('hasil', $diagnosis);
        $request->session()->put('nama_pasien', $nama);
        $request->session()->put('usia_pasien', $usia);
        $request->session()->put('jenis_kelamin', $jenis_kelamin);
        $request->session()->put('berat_badan',$BB_Turun);
        $request->session()->put('demam',$Demam);
        $request->session()->put('malaise',$Malaise);
        $request->session()->put('keringat_malam',$Keringat_malam_hari);
        $request->session()->put('nyeri_dada',$Nyeri_dada_ulu_hati);
        $request->session()->put('nafsu_makan',$Nafsu_makan_turun);
        $request->session()->put('sesak_nafas',$Sesak_nafas);
        $request->session()->put('batuk',$Batuk);
        HistoryPerhitungan::create([
            'nama_pasien' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'usia' => $usia,
            'hasil' => $diagnosis,
            'berat_badan' => $BB_Turun,
            'demam' => $Demam,
            'malaise' => $Malaise,
            'keringat_malam' => $Keringat_malam_hari,
            'nyeri_dada' => $Nyeri_dada_ulu_hati,
            'nafsu_makan' => $Nafsu_makan_turun,
            'sesak_nafas' => $Sesak_nafas,
            'batuk' => $Batuk,
            'id_akun' => auth()->id(),
        ]);
        return redirect()->route('deteksi');
    }
}
