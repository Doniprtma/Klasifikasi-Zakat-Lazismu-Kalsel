<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'bobot', 'atribut', 'kode_kriteria'];
    protected $guarded = [];

    /*public function datauji()
    {
        return $this->belongsTo(Datauji::class);
    }*/
}
