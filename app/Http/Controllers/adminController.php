<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
   public function getAkun()
   {
        $user = User::all();

        return view('admin.index', compact('user'));
   }
}
