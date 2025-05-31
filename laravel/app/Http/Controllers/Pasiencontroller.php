<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function index()
    {
        $data = pasien::all();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|string|max:255',
            'nik'       => 'required|integer|unique:pasiens,nik',
            'tgl_lahir' => 'required|date',
            'alamat'    => 'required|string|max:255',
            'no_hp'     => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $pasien = pasien::create($validator->validated());

        return response()->json([
            'success' => true,
            'data'    => $pasien,
            'message' => 'Pasien berhasil ditambahkan'
        ], 201);
    }

    public function show($id)
    {
        $pasien = pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Pasien tidak ditemukan'], 404);
        }

        return response()->json($pasien);
    }

    public function update(Request $request, $id)
    {
        $pasien = pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Pasien tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'nik'       => 'required|integer|unique:pasiens,nik,' . $id,
            'tgl_lahir' => 'required|date',
            'alamat'    => 'required|string|max:255',
            'no_hp'     => 'required|string|max:255',
        ]);

        $pasien->update($validated);

        return response()->json([
            'message' => 'Data pasien berhasil diperbarui!',
            'data'    => $pasien
        ]);
    }

    public function destroy($id)
    {
        $pasien = pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Pasien tidak ditemukan'], 404);
        }

        $pasien->delete();

        return response()->json(['message' => 'Data pasien berhasil dihapus!']);
    }
}
