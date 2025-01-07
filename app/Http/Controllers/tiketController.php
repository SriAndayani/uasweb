<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use Illuminate\Http\Request;

class tiketController extends Controller
{
    public function index()
    {
        $events = Event::with('tikets')->get();

        return view('admin.tiket.show', compact('events'));
    }

    public function show($tiket_id)
    {
        $tikets = Tiket::where('id', $tiket_id)->first();

        return view('admin.tiket.detail', compact('tikets'));
    }

    public function detail($event_id)
    {
        $event = \App\Models\Event::with('tikets')->findOrFail($event_id);

        return view('admin.tiket.detail', [
            'event' => $event,
            'tikets' => $event->tikets,
        ]);
    }

    public function create()
    {
        return view('admin.tiket.create');
    }

    public function store(Request $request)
    {
        Tiket::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok_tiket' => $request->stok_tiket, 
        ]);

        return redirect()->route('admin.tiket')->with('created', 'Tiket berhasil di tambahkan');
    }
}
