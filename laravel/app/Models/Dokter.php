<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

   // App\Models\Dokter.php
protected $fillable = ['nama', 'spesialis', 'jadwal_praktek', 'no_str'];

    // Jika nama tabelmu tidak sesuai konvensi (yaitu 'dokters'), tambahkan ini:
    // protected $table = 'nama_tabel';

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'foreign_key', 'local_key');
    }
}
