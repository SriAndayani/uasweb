<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function admin(){
        return view('admin.index');
    }

    public function penyelenggara(){
        echo "selamat, datangg di EVENT ORGANIZERR!!";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout</a>";
    }

    public function pelanggan(){
        echo "selamat, datangg di TIKETEVENTTT!!";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout</a>";
    }
}
