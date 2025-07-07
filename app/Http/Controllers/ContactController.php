<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage; // Import Model ContactMessage
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

class ContactController extends Controller
{
    /**
     * Store a newly created contact message in storage.
     * Menyimpan pesan kontak yang baru dikirim.
     */
    public function store(Request $request)
    {
        // Validasi input yang diterima dari request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ]);

        // Jika validasi gagal, kembalikan error
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }

        // Buat dan simpan pesan kontak baru ke database
        $contactMessage = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Kembalikan respon sukses
        return response()->json([
            'message' => 'Pesan berhasil dikirim!',
            'data' => $contactMessage
        ], 201); // 201 Created
    }
}