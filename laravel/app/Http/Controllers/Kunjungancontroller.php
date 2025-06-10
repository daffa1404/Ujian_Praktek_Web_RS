<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    // Endpoint JSON untuk API
    public function api()
    {
        return response()->json(Kunjungan::with('pasien', 'dokter')->get());
    }

    // Menampilkan halaman index
    public function index()
    {
        return view('kunjungan', [
            'kunjungans' => Kunjungan::with('pasien', 'dokter')->get(),
            'pasiens' => Pasien::all(),
            'dokters' => Dokter::all(),
        ]);
    }

    // Simpan kunjungan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal'   => 'required|date',
            'keluhan'   => 'required|string',
        ]);

        Kunjungan::create($validated);

        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan berhasil ditambahkan.');
    }

    // Menampilkan detail kunjungan via JSON
    public function show($id)
    {
        $kunjungan = Kunjungan::with(['dokter', 'pasien'])->find($id);

        if (!$kunjungan) {
            return response()->json(['message' => 'Kunjungan tidak ditemukan'], 404);
        }

        return response()->json($kunjungan);
    }

    // Hapus kunjungan
    public function destroy($id)
    {
        $kunjungan = Kunjungan::find($id);

        if (!$kunjungan) {
            return redirect()->route('kunjungan.index')
                ->with('error', 'Kunjungan tidak ditemukan');
        }

        $kunjungan->delete();

        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan berhasil dihapus.');
    }

    // Update kunjungan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string|max:500'
        ]);

        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->update($validated);

        return redirect()->route('kunjungan.index')
            ->with('success', 'Data kunjungan berhasil diperbarui');
    }
}