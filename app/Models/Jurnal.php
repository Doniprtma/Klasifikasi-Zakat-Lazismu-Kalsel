<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $table = 'jurnal';
    protected $primaryKey = "id";
    protected $fillable = ['kategoridana_id', 'jenis', 'tgl_transaksi', 'no_ref', 'nomor_akun', 'nama_akun', 'keterangan', 'anggaran', 'program', 'bank', 'cabang_id', 'ket_dana'];
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
