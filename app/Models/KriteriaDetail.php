<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaDetail extends Model
{
    use HasFactory;
    
    protected $table = 'kriteria_detail';
    protected $primaryKey = "id";
    protected $fillable = ['keterangan', 'nilai', 'kode_kriteria'];
    protected $guarded = [];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
}
