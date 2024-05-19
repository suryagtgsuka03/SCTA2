<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'supirs';
    protected $fillable = [
        'nama',
        'no_ktp',
        'umur',
        't_lahir',
        'p_truk',
        'asal',
        'foto',
        'foto_ktp',
        'created_at',
        'updated_at'
    ];
}