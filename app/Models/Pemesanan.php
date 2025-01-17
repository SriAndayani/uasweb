<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';

    protected $fillable = [
        'user_id',
        'event_id',
        'tiket_id',
        'jumlah_tiket',
        'total_harga',
        'status',
        'bukti_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }


}
