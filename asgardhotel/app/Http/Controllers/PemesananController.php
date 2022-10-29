<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Kamar;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.pemesanan', [
            'kamar' => Kamar::all()
        ]);
    }

    public function resepsionis()
    {
        return view('resepsionis', [
            'pemesanan' => Pemesanan::All()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemesananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_cek_in' => 'required|max:200',
            'tanggal_cek_out' => 'required|max:200',
            'jumlah_kamar' => 'required|max:200',
            'nama_pemesan' => 'required|max:200',
            'email' => 'required|max:200',
            'no_telp' => 'required|max:200',
            'nama_tamu' => 'required|max:200',
            'kamar_id' => 'required|max:200',
        ]);

        Pemesanan::create([
            'id_user' => $request->id_user,
            'tanggal_cek_in' => $request->tanggal_cek_in,
            'tanggal_cek_out' => $request->tanggal_cek_out,
            'jumlah_kamar' => $request->jumlah_kamar,
            'nama_pemesan' => $request->nama_pemesan,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'nama_tamu' => $request->nama_tamu,
            'kamar_id' => $request->kamar_id,
        ]);

    return redirect('/riwayat-pemesanan');
    }

    public function status(Request $request, $id)
    {
        Pemesanan::find($id)->update([
            'status' => $request->status
        ]);

        if ($request->status === 'Check Out') {
            $p = Pemesanan::where('id', $id)->first();

            Kamar::find($p->kamar_id)->update([
                'jumlah_kamar' => $p->kamar->jumlah_kamar + $p->jumlah_kamar
            ]);
        }

        return redirect('resepsionis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemesananRequest  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
