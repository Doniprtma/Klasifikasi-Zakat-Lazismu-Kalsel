<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanDana extends Model
{
    use HasFactory;
    protected $table = 'pengaturan_dana';
    protected $primaryKey = "id";
    protected $fillable = ['fakir', 'miskin', 'amil', 'mualaf', 'riqab', 'gharim', 'fisabillah', 'ibnu_sabil'];
    protected $guarded = [];

    /*public function datauji()
    {
        return $this->belongsTo(Datauji::class);
    }*/
}
