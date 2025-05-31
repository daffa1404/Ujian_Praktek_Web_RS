<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kunjungan; // pastikan model ini ada dan namespace-nya benar

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nik', 'tgl_lahir', 'alamat', 'no_hp'];

    /**
     * Relasi: Satu pasien memiliki banyak kunjungan.
     */
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'pasien_id', 'id');
        // 'pasien_id' = foreign key di tabel 'kunjungans'
        // 'id'        = primary key di tabel 'pasiens'
    }
}
