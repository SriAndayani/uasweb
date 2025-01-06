<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventData = [
            [
                'nama' => 'Classic Retire 2025',
                'gambar' => 'asset/event/konser3.jpeg',
                'deskripsi' => 'A live concert event featuring popular bands.',
                'tanggal_event' => '2025-05-20',
                'lokasi' => 'Jalan Alas Purwa, Denpasar No.75, Bali',
                'status' => 'aktif'
            ],
            [
                'nama' => 'Canggu Festival',
                'gambar' => 'asset/event/konser3.jpeg',
                'deskripsi' => 'A live concert event featuring popular bands.',
                'tanggal_event' => '2025-05-21',
                'lokasi' => 'Jalan Alas Purwa, Denpasar No.75, Bali',
                'status' => 'aktif'
            ],
        ];

        foreach($eventData as $key => $val){
            Event::create($val);
        }
    }
}
