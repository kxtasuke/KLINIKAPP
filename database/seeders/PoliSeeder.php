<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_polis' => 'POLI001',
                'nama' => 'Poli Gigi',
                'deskripsi' => 'Pelayanan kesehatan gigi dan mulut.',
                'biaya' => 100000,
                'is_aktif' => true,
            ],

            [
                'kode_polis' => 'POLI002',
                'nama' => 'Poli Anak',
                'deskripsi' => 'Pelayanan kesehatan untuk anak-anak.',
                'biaya' => 150000,
                'is_aktif' => true,
            ],

            [
                'kode_polis' => 'POLI003',
                'nama' => 'Poli Jantung',
                'deskripsi' => 'Pelayanan kesehatan jantung dan pembuluh darah.',
                'biaya' => 100000,
                'is_aktif' => true,
            ],
        ];
        \App\Models\Poli::insert($data);
    }
}
