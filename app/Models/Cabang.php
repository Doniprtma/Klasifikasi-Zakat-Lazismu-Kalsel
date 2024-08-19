<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabang';
    protected $primaryKey = "id";
    protected $fillable = ['kategori', 'nama_kantor'];
    protected $guarded = [];

    /*public function datauji()
    {
        return $this->belongsTo(Datauji::class);
    }*/
}
