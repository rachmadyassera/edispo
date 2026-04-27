<?php
namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function create()
    {
        return view('letters.create');
    }

    public function store(Request $request)
    {
        // Validasi input agar data tidak ngawur
        $validated = $request->validate([
            'reference_number' => 'required|unique:letters',
            'sender' => 'required',
            'letter_date' => 'required|date',
            'received_date' => 'required|date',
            'subject' => 'required',
        ]);

        // Simpan ke database
        Letter::create($validated);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dicatat!');
    }
}
