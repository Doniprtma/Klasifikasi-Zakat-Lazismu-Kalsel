<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDana extends Model
{
    use HasFactory;
    protected $table = 'kategori_dana';
    protected $primaryKey = "id";
    protected $fillable = ['nama_kategori', 'jenis_dana'];
    protected $guarded = [];

    /*public function datauji()
    {
        return $this->belongsTo(Datauji::class);
    }*/
}
