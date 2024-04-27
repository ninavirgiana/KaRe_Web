<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Pupuk Kompos',
                'foto_produk' => null,
                'harga_produk' => 'Rp.25.000',
                'deskripsi_produk' => 'Pupuk kompos terbuat dari bahan-bahan organik yang diurai oleh mikroorganisme',
                'stok_produk' => '30',
            ],
            [
                'nama_produk' => 'Pupuk Kandang',
                'foto_produk' => null,
                'harga_produk' => 'Rp.20.000',
                'deskripsi_produk' => 'Pupuk kandang berasal dari kotoran hewan ternak, seperti sapi, kambing, ayam, dan kerbau.',
                'stok_produk' => '20',
            ],
        ]);
    }
}
