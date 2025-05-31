<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::all();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'           => 'required|string|max:255',
            'spesialis'   => 'required|string|max:255',
            'jadwal_praktek' => 'required|string|max:255',
            'no_str'         => 'required|string|unique:dokters,no_str|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $dokter = Dokter::create($validator->validated());

        return response()->json([
            'success' => true,
            'data'    => $dokter,
            'message' => 'Dokter berhasil ditambahkan'
        ], 201);
    }

    public function show($id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json(['message' => 'Dokter tidak ditemukan'], 404);
        }

        return response()->json($dokter);
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json(['message' => 'Dokter tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'spesialis'   => 'required|string|max:255',
            'jadwal_praktek' => 'required|string|max:255',
            'no_str'         => 'required|string|max:50|unique:dokters,no_str,' . $id,
        ]);

        $dokter->update($validated);

        return response()->json([
            'message' => 'Data dokter berhasil diperbarui!',
            'data'    => $dokter
        ]);
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json(['message' => 'Dokter tidak ditemukan'], 404);
        }

        $dokter->delete();

        return response()->json(['message' => 'Data dokter berhasil dihapus!']);
    }
}
