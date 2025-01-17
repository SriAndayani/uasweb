<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dashboard()
    {
        // Jumlah user aktif
        $activeUsers = User::where('role', 'pelanggan')->count();

        // Jumlah admin aktif
        $activeAdmins = User::where('role', 'admin')->count();

        // Jumlah transaksi
        $totalTransactions = Pemesanan::where('status', 'dibayar')->count();

        // Jumlah event aktif
        $activeEvents = Event::count();

        return view('admin.dashboard', compact('activeUsers', 'activeAdmins', 'totalTransactions', 'activeEvents'));
    }

   public function admin()
   {
        $user = User::where('role', 'admin')->get();
        return view('admin.admin', [
            'user' => $user
        ]);
   }
   public function pelanggan()
   {
        $user = User::where('role', 'pelanggan')->get();
        return view('admin.pelanggan', [
            'user' => $user
        ]);
   }

   public function createAdmin()
   {
        return view('admin.user.adminCreate');
   }

   public function storeAdmin(Request $request)
   {

    User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'role' => 'admin',
        ]);

        return redirect()->route('admin.admin')->with('created', 'Akun Admin berhasil di tambahkan');
   }

   public function destroy($user_id)
   {
        User::where('id', $user_id)->delete();

        return redirect()->route('admin.admin')->with('deleted', 'Akun Admin berhasil di hapus!');
   }
}
