<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function data()
    {
        return view('pendataan');
    }

    public function datanama($nama)
    {
        return view('datanama', ["nama" => $nama]);
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function kirim(Request $request)
    {
        $name = $request->input('nama');
        $address = $request->input('alamat');

        return view('dashboard', ['name'=>$name,'address'=>$address]);
    }
}
