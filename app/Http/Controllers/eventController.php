<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class eventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('index', [
            'events' => $events
        ]);
    }

    public function event(Request $request)
    {
        $search = $request->input('search');

        $events = Event::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('penyelenggara', 'like', "%{$search}%");
        })
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.event', [
            'events' => $events,
            'search' => $search
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
            'gambar' => 'storage/'.$this->storeFile('gambar_event', $request->file('gambar')),
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.event')->with('created', 'Data Event berhasil di tambahkan');
    }

    public static function storeFile(string $folder, $file)
    {
        if ($file && $file->isValid()) {
            return $file->store($folder, 'public');
        }

        return null;
    }

    public function edit($event_id)
    {
        $events = Event::findOrFail($event_id);

        return view('admin.event.edit', compact('events'));
    }

    public function update(Request $request, $event_id)
    {

        // Update data event
        Event::where('id', $event_id)->update([
            'nama' => $request->nama,
            'penyelenggara' => $request->penyelenggara,
            'gambar' => 'storage/'.$this->storeFile('gambar_event', $request->file('gambar')),
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.event')->with('updated', 'Data barang berhasi di edit!');
    }

    public function destroy($event_id)
   {
        Event::where('id', $event_id)->delete();

        return redirect()->route('admin.admin')->with('deleted', 'Akun Admin berhasil di hapus!');
   }
}
