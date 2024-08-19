<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganSaw extends Model
{
    use HasFactory;
    protected $table = 'proses_perhitungan';
    protected $primaryKey = "id";
    protected $fillable = ['tgl_perhitungan', 'penerima_id', 'kode_kriteria', 'nilai'];
    protected $guarded = [];

    public function kriteriadetail()
    {
        return $this->belongsTo(KriteriaDetail::class, 'kode_kriteria', 'kode_kriteria');
    }
    public function kriteriadetailnilai()
    {
        return $this->belongsTo(KriteriaDetail::class, 'kode_kriteria', 'kode_kriteria')
                    ->where('nilai', $this->nilai);
    }

    public function penerimaZakat()
    {
        return $this->belongsTo(PenerimaZakat::class, 'penerima_id', 'id');
    }
}
