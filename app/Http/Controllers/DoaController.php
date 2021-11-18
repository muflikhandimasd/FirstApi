<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DoaController extends Controller
{
    public function doa()
    {
        $response = Http::get('https://doa-doa-api-ahmadramadhan.fly.dev/api');
        $data = $response->json();
        // dd($data);
        return view('welcome', compact('data'));
    }

    public function postData()
    {
        return view('postdata');
    }

    public function posting(Request $request)
    {
        Http::post('https://ictjuara.000webhostapp.com/api/regis', $request->input());
        return redirect()->back();
    }

    public function kategori()
    {
        return view('kategori');
    }

    public function addkategori(Request $request)
    {
        Http::post('https://ictjuara.000webhostapp.com/api/add-kategori', $request->input());
        return redirect()->back();
    }
}