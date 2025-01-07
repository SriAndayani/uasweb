<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class eventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('index', [
            'events' => $events
        ]);
    }

    public function event()
    {
        $events = Event::all();
        return view('admin.event', [
            'events' => $events
        ]);
    }

    public function show($event_id)
    {
        $events = Event::where('id', $event_id)->first();

        return view('admin.event.detail', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        Event::create([
            'nama' => $request->nama,
            'penyelenggara' => $request->penyelenggara,
            'gambar' => $request->gambar,
            'tanggal_event' => $request->tanggal_event, 
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.event')->with('created', 'Data Event berhasil di tambahkan');
    }

    public function edit($event_id)
    {
        $events = Event::findOrFail($event_id);

        return view('admin.event.edit', compact('events'));
    }

    public function update(Request $request, $event_id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            'tanggal_event' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $events = Event::findOrFail($event_id);

        // Jika ada file gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($events->gambar && file_exists(storage_path('app/public/' . $events->gambar))) {
                unlink(storage_path('app/public/' . $events->gambar));
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('asset/event', 'public');
            $events->gambar = $path;
        }

        // Update data event
        $events->update([
            'nama' => $request->nama,
            'penyelenggara' => $request->penyelenggara,
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.event', $events->id)->with('updated', 'Data Event berhasil di edit!');
    }

}
