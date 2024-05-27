<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TOrder extends Model
{
    use HasFactory;
    protected $table = 't_orders';
    protected $fillable = [
        'perusahaan',
        'no_spk',
        'no_do',
        'j_barang',
        'jumlah',
        'ppn',
        'pph',
        't_susut',
        'c_susut',
        't_barang',
        't_bongkar',
        't_angkut'
    ];
}