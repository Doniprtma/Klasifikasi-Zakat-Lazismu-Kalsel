<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranDana extends Model
{
    use HasFactory;
    protected $table = 'penyaluran_dana';
    protected $primaryKey = "id";
    protected $fillable = [
        'tgl_perhitungan',
        'penerima_id',
        'total_dana_diterima',
        'jenis_zakat',
        'persentase',
        'tgl_penyaluran',
        'cash_transfer',
        'keterangan'
    ];
    protected $guarded = [];

    public function penerimaZakat()
    {
        return $this->belongsTo(PenerimaZakat::class, 'penerima_id', 'id');
    }
}
