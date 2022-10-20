<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.beranda', [
            'fasilitasHotel' => FasilitasHotel::all(),
            'fasilitasKamar' => FasilitasKamar::all(),
            'kamar' => Kamar::all()
        ]);
    }

    public function kamar()
    {
        return view('pages.kamar', [
            'fasilitasKamar' => FasilitasKamar::all(),
            'kamar' => Kamar::all()
        ]);
    }

    public function fasilitas()
    {
        return view('pages.fasilitas', [
            'fasilitasHotel' => FasilitasHotel::all(),
        ]);
    }
}
