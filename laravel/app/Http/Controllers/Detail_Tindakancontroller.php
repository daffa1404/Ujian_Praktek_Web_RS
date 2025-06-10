<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_Tindakan;
use App\Models\Kunjungan;
use App\Models\Tindakan;

class Detail_TindakanController extends Controller
{
    public function index()
    {
        $details = Detail_Tindakan::with(['kunjungan.pasien', 'tindakan'])->get();
        $kunjungans = Kunjungan::with('pasien')->get();
        $tindakans = Tindakan::all();

        return view('detail_tindakan', [
            'details' => $details,
            'kunjungans' => $kunjungans,
            'tindakans' => $tindakans,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'tindakan_id' => 'required|exists:tindakans,id',
            'keterangan' => 'required|string|max:255',
            'subtotal' => 'required|numeric|min:0',
        ]);

        Detail_Tindakan::create($validated);

        return redirect()->back()->with('success', 'Detail tindakan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'tindakan_id' => 'required|exists:tindakans,id',
            'keterangan' => 'required|string|max:255',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $detail = Detail_Tindakan::findOrFail($id);
        $detail->update($validated);

        return redirect()->back()->with('success', 'Detail tindakan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $detail = Detail_Tindakan::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Detail tindakan berhasil dihapus.');
    }
}
