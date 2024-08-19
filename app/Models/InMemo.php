<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InMemo extends Model
{
    use HasFactory;
    protected $table = 'inmemo';
    protected $primaryKey = "id";
    protected $fillable = ['kategoridana_id', 'uraian', 'anggaran', 'tglpengajuan', 'tglpenyaluran', 'file', 'cabang_id', 'status'];
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(KategoriDana::class, 'kategoridana_id', 'id');
    }
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id', 'id');
    }
}
