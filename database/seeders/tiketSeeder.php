<?php

namespace Database\Seeders;

use App\Models\Tiket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventData = [
            [
                'event_id' => 1,
                'nama_kategori' => 'Early Bird',
                'deskripsi' => 'ini tiket early bird event 1 tiket trial',
                'price' => 100000,
                'stok_tiket' => 100
            ],
            [
                'event_id' => 2,
                'nama_kategori' => 'Early Bird',
                'deskripsi' => 'ini tiket early bird event 2 tiket trial',
                'price' => 100000,
                'stok_tiket' => 100
            ],
            [
                'event_id' => 3,
                'nama_kategori' => 'Early Bird',
                'deskripsi' => 'ini tiket early bird event 3 tiket trial',
                'price' => 100000,
                'stok_tiket' => 100
            ]
        ];

        foreach($eventData as $key => $val){
            Tiket::create($val);
        }
    }
}
