<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index()
    {
        $data = Kunjungan::with(['dokter', 'pasien'])->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal'   => 'required|date',
            'keluhan'   => 'required|string',
        ]);

        $kunjungan = Kunjungan::create($validated);

        return response()->json([
            'message' => 'Kunjungan berhasil dibuat',
            'data' => $kunjungan
        ], 201);
    }

    public function show($id)
    {
        $kunjungan = Kunjungan::with(['dokter', 'pasien'])->find($id);

        if (!$kunjungan) {
            return response()->json(['message' => 'Kunjungan tidak ditemukan'], 404);
        }

        return response()->json($kunjungan);
    }

    public function destroy($id)
    {
        $kunjungan = Kunjungan::find($id);

        if (!$kunjungan) {
            return response()->json(['message' => 'Kunjungan tidak ditemukan'], 404);
        }

        $kunjungan->delete();

        return response()->json(['message' => 'Kunjungan berhasil dihapus']);
    }
}
