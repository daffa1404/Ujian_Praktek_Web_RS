<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function index()
    {
        $data = Tindakan::all();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga'         => 'required|numeric|min:0',
        ]);

        $tindakan = Tindakan::create($validated);

        return response()->json([
            'message' => 'Tindakan berhasil dibuat',
            'data' => $tindakan
        ], 201);
    }

    public function show($id)
    {
        $tindakan = Tindakan::find($id);

        if (!$tindakan) {
            return response()->json(['message' => 'Tindakan tidak ditemukan'], 404);
        }

        return response()->json($tindakan, 200);
    }

    public function update(Request $request, $id)
    {
        $tindakan = Tindakan::find($id);

        if (!$tindakan) {
            return response()->json(['message' => 'Tindakan tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga'         => 'required|numeric|min:0',
        ]);

        $tindakan->update($validated);

        return response()->json([
            'message' => 'Tindakan berhasil diperbarui',
            'data' => $tindakan
        ], 200);
    }

    public function destroy($id)
    {
        $tindakan = Tindakan::find($id);

        if (!$tindakan) {
            return response()->json(['message' => 'Tindakan tidak ditemukan'], 404);
        }

        $tindakan->delete();

        return response()->json(['message' => 'Tindakan berhasil dihapus'], 200);
    }
}
