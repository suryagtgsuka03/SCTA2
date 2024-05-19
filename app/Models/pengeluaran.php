<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluarans';
    protected $fillable = [
        'tanggal',
        'jumlah',
        'sumber',
        'keterangan'
    ];
}