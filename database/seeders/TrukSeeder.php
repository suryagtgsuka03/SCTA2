<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('truks')->insert(
            [
                [
                    'plat_truk' => 'B 1234 MC',
                    'jenis_truk' => 'Tronton'
                ],
                [
                    'plat_truk' => 'BM 1234 DC',
                    'jenis_truk' => 'Trinton'
                ],
                [
                    'plat_truk' => 'BK 1234 CS',
                    'jenis_truk' => 'Engkel'
                ],
            ]
        );
    }
}