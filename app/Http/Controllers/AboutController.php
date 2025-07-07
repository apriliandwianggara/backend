<?php

namespace App\Http\Controllers;

use App\Models\About; // Import Model About
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the 'About Me' information.
     * Mengembalikan informasi 'Tentang Saya'. Biasanya hanya ada satu entri.
     */
    public function index()
    {
        // Mengambil entri pertama dari tabel 'abouts'
        $about = About::first();
        // Jika tidak ada data, kembalikan respon kosong atau error 404
        if (!$about) {
            return response()->json(['message' => 'About information not found'], 404);
        }
        return response()->json($about);
    }
}