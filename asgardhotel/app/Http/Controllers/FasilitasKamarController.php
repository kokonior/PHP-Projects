<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use App\Http\Requests\StoreFasilitasKamarRequest;
use App\Http\Requests\UpdateFasilitasKamarRequest;
use App\Models\Kamar;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fasilitaskamar.index', [
            'fasilitas' => FasilitasKamar::all(),
            'kamar' => Kamar::all()
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
     * @param  \App\Http\Requests\StoreFasilitasKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required',
            'nama_fasilitas' => 'required|max:200',
        ]);

        FasilitasKamar::create([
            'kamar_id' => $request->kamar_id,
            'nama_fasilitas' => $request->nama_fasilitas,
        ]);

        return redirect('/fasilitas-kamar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasKamar $fasilitasKamar)
    {
        return view('admin.fasilitaskamar.edit', [
            'fasilitas' => FasilitasKamar::find($fasilitasKamar->id),
            'kamar' => Kamar::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasKamarRequest  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasKamar $fasilitasKamar)
    {
        $request->validate([
            'kamar_id' => 'required',
            'nama_fasilitas' => 'required|max:200',
        ]);

        FasilitasKamar::find($fasilitasKamar->id)->update([
            'kamar_id' => $request->kamar_id,
            'nama_fasilitas' => $request->nama_fasilitas,
        ]);

        return redirect('/fasilitas-kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasKamar $fasilitasKamar)
    {
        FasilitasKamar::destroy($fasilitasKamar->id);

        return redirect('/fasilitas-kamar');
    }
}
