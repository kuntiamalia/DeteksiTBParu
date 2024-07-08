<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\StoreHistoryDeteksiRequest;
use App\Models\HistoryDeteksi;
use App\Http\Requests\StoreDataRequest;
use App\Models\Data;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

class HistoryDeteksiController extends Controller
{
    public function store(StoreHistoryDeteksiRequest $request)
    {
        $validated = $request->validated();
        
        HistoryDeteksi::create($validated);

        return redirect()->route('history_deteksi.index')->with('success', 'Data has been added successfully.');
    }
}

class DataController extends Controller
{
    public function store(StoreDataRequest $request)
    {
        $validated = $request->validated();
        
        // Simpan data jika validasi berhasil
        // Data::create($validated);

        return redirect()->route('data.index')->with('success', 'Data telah berhasil disimpan.');
    }
}
