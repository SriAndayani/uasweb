<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class roleController extends Controller
{
    public function index(){
        return view('index');
    }

    public function detail($event_id)
    {
        $event = \App\Models\Event::with('tikets')->findOrFail($event_id);

        return view('pelanggan.detail', [
            'event' => $event,
            'tikets' => $event->tikets,
        ]);
    }

    public function pemesanan()
    {
        return view('pelanggan.pemesanan');
    }

    public function login(Request $request){
        // kita bikin requestnya
        $request->validate([      //ini untuk ngevalidasi isi dari form login kita
            'email'=>'required', // required itu untuk kolom email harus di isi pada form login
            'password'=>'required'
        ],[
            // disini kita setting peringatannya kalau mereka kosongin kolomnya
            'email.required'=>'Emailnya tolong di isi ya kak!',
            'password.required'=>'Passwordnya lupa di isi kak!',
        ]);

        //sekaranng kita melakukan pengecekan apakah email yg di masukkan adalah email yang benar?
        $infoLogin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        //pengecekan
        if(Auth::attempt($infoLogin)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            }elseif(Auth::user()->role == 'penyelenggara'){
                return redirect('penyelenggara');
            }elseif(Auth::user()->role == 'pelanggan'){
                return redirect('pelanggan');
            }
        }else{
            return redirect('/login')->withErrors('Username dan Passwordnya salahh lhoo')->withInput();
        }
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request){
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password 'Hash::make($request->password)'
            'phone' => $request->phone,
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    // function logout
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function admin(){
        return view('layout.admin');
    }

}
