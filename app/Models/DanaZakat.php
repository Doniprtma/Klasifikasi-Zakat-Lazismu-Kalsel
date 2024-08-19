<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanaZakat extends Model
{
    use HasFactory;
    protected $table = 'dana_zakat';
    protected $primaryKey = "id";
    protected $fillable = ['jurnal_id', 'jumlah_dana', 'jenis_dana', 'jumlah_dana_awal'];
    protected $guarded = [];

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'jurnal_id', 'id');
    }
}
