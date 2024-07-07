<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SurahController extends Controller
{
    public function getSurah()
    {
        // Mengirim request GET ke API
        $response = Http::get('https://doa-doa-api-ahmadramadhan.fly.dev/api');

        // Memeriksa apakah request berhasil
        if ($response->successful()) {
            // Mengambil data dari respons
            $title = "List of Surah From API";
            $data = $response->json();
            return view('surah', ['data' => $data, 'title' => $title]);
        } else {
            // Menangani kesalahan
            return view('surah', ['error' => 'Failed to retrieve data']);
        }
    }
}