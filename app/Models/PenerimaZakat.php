<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaZakat extends Model
{
    use HasFactory;
    protected $table = 'penerima_zakat';
    protected $primaryKey = "id";
    protected $fillable = ['nama_penerima', 'jenis_zakat', 'alamat', 'cabang_id', 'nik', 'program', 'jenis_kelamin'];
    protected $guarded = [];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }

    public function perhitunganSaw()
    {
        return $this->hasMany(PerhitunganSaw::class, 'penerima_id');
    }
}
