<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_tindakan',
        'harga',
        'kode_icd',
    ];


    public function index()
{
    $tindakans = Tindakan::all();
    return view('tindakan.index', compact('tindakans'));
}

}