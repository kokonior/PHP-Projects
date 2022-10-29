<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }

    public function riwayat()
    {
        return view('user.riwayat',[
            'pemesanan' => Pemesanan::where('id_user', Auth::user()->id)->get()
        ]);
    }

    public function invoice($id)
    {
        return view('user.invoice',[
            'pemesanan' => Pemesanan::find($id)
        ]);
    }

    public function adminHome()
    {
        return view('admin.adminhome');
    }
}
