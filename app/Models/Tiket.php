<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'nama_kategori',
        'deskripsi',
        'price',
        'stok_tiket'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function Pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'tiket_id', 'id');
    }
}
