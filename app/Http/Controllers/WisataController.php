<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WisataController extends Controller
{
    public function wisata()
    {
        $response = Http::get('https://ictjuara.000webhostapp.com/api/wisata');
        $data = $response->json();
        $data = $data['data'];
        return view('wisata', compact('data'));
    }
}