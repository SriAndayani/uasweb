<?php

namespace App\Http\Controllers;

use App\Models\detailPemesanan;
use App\Models\Pemesanan;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class pemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('admin.pemesanan.index', [
            'pemesanan' => $pemesanan
        ]);
    }

    public function checkout(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'ticket_name' => 'required|string',
            'event_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        session([
            'nama' => $request->nama,
            'email' => $request->email,
            'phone' => $request->phone,
            'ticket_name' => $request->ticket_name,
            'event_id' => $request->event_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total_price' => $request->total_price
        ]);
        // dd(session()->all());
        return redirect()->route('pelanggan.pembayaran');
    }

    public function pembayaran()
    {
    $data = session()->only(['nama_event', 'ticket_name', 'quantity', 'total_price', 'event_id']);

    return view('pelanggan.pembayaran', compact('data'));
    }

    public function detailPembayaran(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'nama_event' => 'required|string',
            'ticket_name' => 'required|string',
            'event_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric',
            'bukti_bayar' => 'required|file|mimes:jpg,jpeg,png'
        ]);

        //transaksi database untuk memastikan konsistensi data
        DB::beginTransaction();

        try {
            // Cari tiket_id berdasarkan nama kategori dan event ID
            $tiket = Tiket::where('nama_kategori', $validated['ticket_name'])
                         ->where('event_id', $validated['event_id'])
                         ->firstOrFail();

            // Kurangi stok tiket
            $tiket->decrement('stok_tiket', $validated['quantity']);

            // Simpan data pemesanan
            Pemesanan::create([
                'user_id' => auth()->id(),
                'event_id' => $validated['event_id'],
                'tiket_id' => $tiket->id,
                'jumlah_tiket' => $validated['quantity'],
                'total_harga' => $validated['total_price'],
                'status' => 'pending',
                'bukti_bayar' => 'storage/' . $this->storeFile('bukti_bayar', $request->file('bukti_bayar')),
            ]);

            // Commit transaksi
            DB::commit();

            return redirect()->route('index.pelanggan');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            Log::error('Error pada detailPembayaran: ' . $e->getMessage());
            return redirect()->back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public static function storeFile(string $folder, $file)
    {
        if ($file && $file->isValid()) {
            return $file->store($folder, 'public');
        }

        return null;
    }

    public function showPemesanan()
    {
        $pemesanan = Pemesanan::with(['user', 'event', 'tiket'])->get();

        // return view('pemesanan.index', compact('pemesanans'));
        return view('admin.pemesanan.index', [
            'pemesanan' => $pemesanan
        ]);
    }

    public function edit($pemesanan_id)
    {
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);

        return view('admin.pemesanan.edit', compact('pemesanan'));
    }

    public function update(Request $request, $pemesanan_id)
    {

        // Update data event
        Pemesanan::where('id', $pemesanan_id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('pemesanan.index')->with('updated', 'Data barang berhasi di edit!');
    }

    public function destroy($pemesanan_id)
   {
        Pemesanan::where('id', $pemesanan_id)->delete();

        return redirect()->route('pemesanan.index')->with('deleted', 'Akun Admin berhasil di hapus!');
   }

   public function transaksi()
   {
    $pemesanan = Pemesanan::where('status', 'dibayar')->get();
    return view('admin.pemesanan.transaksi', [
        'pemesanan' => $pemesanan
    ]);
   }

   public function riwayat($user_id)
   {
    $user_id = Auth::id();
    $pemesanan = Pemesanan::with(['user', 'event', 'tiket'])
        ->where('user_id', $user_id)
        ->get();

    return view('pelanggan.riwayat-pesanan', compact('pemesanan'));
   }
}

