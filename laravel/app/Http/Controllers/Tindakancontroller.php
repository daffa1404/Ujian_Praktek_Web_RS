<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function api()
    {
        return response()->json(Tindakan::all());
    }

    public function index()
{
    $tindakans = Tindakan::all();
    return view('tindakan', compact('tindakans')); // Remove .index
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kode_icd' => 'required|string|unique:tindakans,kode_icd',
        ]);

        Tindakan::create([
            'nama_tindakan' => $request->nama_tindakan,
            'harga' => $request->harga,
            'kode_icd' => $request->kode_icd,
        ]);

        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil ditambahkan');
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
            'harga' => 'required|numeric|min:0',
            'kode_icd' => 'required|string|unique:tindakans,kode_icd,'.$id,
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