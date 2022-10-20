<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Http\Requests\StoreKamarRequest;
use App\Http\Requests\UpdateKamarRequest;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kamar.index', [
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
     * @param  \App\Http\Requests\StoreKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kamar' => 'required',
            'jumlah_kamar' => 'required',
            'image' => 'required|image',

        ]);

        $image = $request->file('image')->store('kamar');

        Kamar::create([
            'tipe_kamar' => $request->tipe_kamar,
            'jumlah_kamar' => $request->jumlah_kamar,
            'image' => $image,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        return view('admin.kamar.edit', [
            'kamar' => Kamar::find($kamar->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKamarRequest  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'tipe_kamar' => 'required',
            'jumlah_kamar' => 'required',
            'image' => 'image',
        ]);

        $image = $request->file('image');

        if (!$image){
            $namaImage = $request->image_lama;
        } else {
            $namaImage = $image->store('kamar');
            unlink('storage/'. $request->image_lama);
        }

        Kamar::find($kamar->id)->update([
            'tipe_kamar' => $request->tipe_kamar,
            'jumlah_kamar' => $request->jumlah_kamar,
            'image' => $namaImage,
        ]);

        return redirect('/kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        unlink('storage/' . $kamar->image);
        Kamar::destroy($kamar->id);

        return redirect('/kamar');
    }
}
