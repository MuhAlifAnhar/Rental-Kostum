<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Mail\FormMail;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function kontak(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ];

        Mail::to('lisatandiayu150904@gmail.com')
                ->cc('sultankautsar20@gmail.com')
                ->send(new FormMail($data));

        return back()->with('success', 'Pesan Terkirim!');
    }
}
