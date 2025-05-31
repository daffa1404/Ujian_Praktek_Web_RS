<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail_Tindakan extends Model
{
    protected $table = 'detail_tindakans';

    protected $fillable = [
        'kunjungan_id',
        'tindakan_id',
        'keterangan',
        'subtotal',
    ];

    public $timestamps = false; // Karena tidak ada kolom created_at dan updated_at

    /**
     * Relasi ke model Kunjungan
     */
    public function kunjungan(): BelongsTo
    {
        return $this->belongsTo(Kunjungan::class);
    }

    /**
     * Relasi ke model Tindakan
     */
    public function tindakan(): BelongsTo
    {
        return $this->belongsTo(Tindakan::class);
    }
}
