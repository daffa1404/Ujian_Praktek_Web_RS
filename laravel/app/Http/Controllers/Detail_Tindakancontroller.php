<?php

namespace App\Http\Controllers;

use App\Models\Detail_Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Detail_TindakanController extends Controller
{
    public function index()
    {
        $data = Detail_Tindakan::with(['kunjungan', 'tindakan'])->get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'tindakan_id'  => 'required|exists:tindakans,id',
            'keterangan'   => 'required|string',
            'subtotal'     => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $detailTindakan = Detail_Tindakan::create($validator->validated());

        return response()->json([
            'success' => true,
            'data'    => $detailTindakan,
            'message' => 'Detail tindakan berhasil ditambahkan'
        ], 201);
    }

    public function show($id)
    {
        $detailTindakan = Detail_Tindakan::with(['kunjungan', 'tindakan'])->find($id);

        if (!$detailTindakan) {
            return response()->json(['message' => 'Detail tindakan tidak ditemukan'], 404);
        }

        return response()->json($detailTindakan);
    }

    public function update(Request $request, $id)
    {
        $detailTindakan = Detail_Tindakan::find($id);

        if (!$detailTindakan) {
            return response()->json(['message' => 'Detail tindakan tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'tindakan_id'  => 'required|exists:tindakans,id',
            'keterangan'   => 'required|string',
            'subtotal'     => 'required|numeric|min:0',
        ]);

        $detailTindakan->update($validated);

        return response()->json([
            'message' => 'Detail tindakan berhasil diperbarui!',
            'data'    => $detailTindakan
        ]);
    }

    public function destroy($id)
    {
        $detailTindakan = Detail_Tindakan::find($id);

        if (!$detailTindakan) {
            return response()->json(['message' => 'Detail tindakan tidak ditemukan'], 404);
        }

        $detailTindakan->delete();

        return response()->json(['message' => 'Detail tindakan berhasil dihapus!']);
    }
}
