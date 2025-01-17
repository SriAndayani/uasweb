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

    public function create($event_id)
    {
        return view('admin.tiket.create', compact('event_id'));
    }

    public function store(Request $request, $event_id)
    {
         // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stok_tiket' => 'required|integer|min:0', // Validasi stok_tiket
        ]);

        // $stok_tiket = (int) $request->stok_tiket;
        Tiket::create([
            'event_id' => $event_id,
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'price' => (float) $request->price,
            'stok_tiket' => (int) $request->stok_tiket,
        ]);

        return redirect()->route('admin.tiket')->with('created', 'Tiket berhasil di tambahkan');
    }

    public function edit($tiket_id)
    {
        $tikets = Tiket::findOrFail($tiket_id);
        $events = Event::findOrFail($tikets->event_id);

        return view('admin.tiket.edit', compact('tikets', 'events'));
    }

    public function update(Request $request, $tiket_id)
    {

        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'price' => 'required|numeric|min:0', // Pastikan price diisi dan bernilai angka
        ]);

        // Update data event
        Tiket::where('id', $tiket_id)->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'price' => $request->price,
        ]);

        // Ambil event_id dari tiket
        $event_id = Tiket::findOrFail($tiket_id)->event_id;

        return redirect()->route('tiket.detail', ['event_id' => $event_id])->with('updated', 'Data tiket berhasi di edit!');
    }

    public function destroy($tiket_id)
   {
        // Ambil event_id dari tiket sebelum dihapus
        $event_id = Tiket::findOrFail($tiket_id)->event_id;

        Tiket::where('id', $tiket_id)->delete();

        return redirect()->route('tiket.detail', ['event_id' => $event_id])->with('deleted', 'Tiket berhasil di hapus!');
   }

   public function pemesanan($event_id)
   {

       $event = \App\Models\Event::with('tikets')->findOrFail($event_id);

       $tikets = $event->tikets;

       return view('pelanggan.pemesanan', [
           'event' => $event,
           'tikets' => $tikets,
           'event_id' => $event_id,
       ]);
   }

   public function storePemesanan(Request $request)
   {
    // dd($request->all());
    $request->validate([
        'nama_event' => 'required|string',
        'ticket_name' => 'required|string',
        'quantity' => 'required|integer|min:1',
        'price' => 'required|numeric',
        'total_price' => 'required|numeric',
        'event_id' => 'required|integer',
    ]);
    // dd($request->all());
    session([
        'nama_event' => $request->nama_event,
        'ticket_name' => $request->ticket_name,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'total_price' => $request->total_price,
        'event_id' => $request->event_id,
    ]);
    // dd(session()->all());
    return redirect()->route('pelanggan.detail-pemesanan');
   }

   public function detailPemesanan()
   {
    // dd(session()->all());
    $data = session()->only(['ticket_name', 'quantity', 'price', 'total_price', 'event_id', 'nama_event']);

    return view('pelanggan.detail-pemesanan', compact('data'));
   }



}

