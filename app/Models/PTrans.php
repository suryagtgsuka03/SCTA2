<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTrans extends Model
{
    use HasFactory;
    protected $table = 'p_trans';

    protected $fillable = [
        'no_do',
        'plat_truk',
        'supir',
        'tgl_muat',
        'tgl_bongkar',
        'tot_muat',
        'tot_bongkar',
        'no_spb',
        'supir_id'
    ];

    public function supir()
    {
        return $this->belongsTo(Supir::class, 'supir_id');
    }
}