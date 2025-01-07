<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'penyelenggara',
        'gambar',
        'tanggal_event',
        'lokasi',
        'deskripsi'
    ];

    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'event_id', 'id');
    }
}
