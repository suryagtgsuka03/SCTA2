<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $fillable = [
        't_masuk',
        't_kirim',
        'durasi',
        'i_nomor',
        'j_ditagih',
        'j_dibayar',
        'n_pajak',
        'nom_pajak'
    ];
}