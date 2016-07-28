<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class LaravelController extends Controller
{
    public function hello($nama = 'laravel')
    {
    	return view('hello', ['nama' => $nama]);
    }

    public function form()
    {
    	return view('form');
    }

    public function getNama(Request $request)
    {
    	$nama = $request->input('nama');
    	return view('nama', ['nama' => $nama]);
    }
}
