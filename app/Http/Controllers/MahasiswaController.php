<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function tambahData()
    {
        return view('tambah-data');
    }
}
