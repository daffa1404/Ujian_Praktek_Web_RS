<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\Detail_TindakanController;

// === API Resources === //
Route::apiResource('pasien', PasienController::class);
Route::apiResource('dokter', DokterController::class);
Route::apiResource('tindakan', TindakanController::class);
Route::apiResource('kunjungan', KunjunganController::class);
Route::apiResource('detail-tindakan', Detail_TindakanController::class);

// === Custom Routes === //
Route::post('/kunjungans/{kunjungan}/add-Tindakan', [Detail_TindakanController::class, 'store']);

// === Explicit RESTful routes (optional if apiResource already used) === //
// Pasien
Route::put('/pasien/{id}', [PasienController::class, 'update']);
Route::patch('/pasien/{id}', [PasienController::class, 'update']);
Route::delete('/pasien/{id}', [PasienController::class, 'destroy']);

// Dokter
Route::put('/dokter/{id}', [DokterController::class, 'update']);
Route::patch('/dokter/{id}', [DokterController::class, 'update']);
Route::delete('/dokter/{id}', [DokterController::class, 'destroy']);

// Kunjungan
Route::put('/kunjungan/{id}', [KunjunganController::class, 'update']);
Route::patch('/kunjungan/{id}', [KunjunganController::class, 'update']);
Route::delete('/kunjungan/{id}', [KunjunganController::class, 'destroy']);

// Tindakan
Route::put('/tindakan/{id}', [TindakanController::class, 'update']);
Route::patch('/tindakan/{id}', [TindakanController::class, 'update']);
Route::delete('/tindakan/{id}', [TindakanController::class, 'destroy']);

// Detail_tindakan

Route::put('/detail-tindakan/{id}', [Detail_TindakanController::class, 'update']);
Route::patch('/detail-tindakan/{id}', [Detail_TindakanController::class, 'update']);
Route::delete('/detail-tindakan/{id}', [Detail_TindakanController::class, 'destroy']);

// === Authenticated User Route === //
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
