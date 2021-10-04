<?php

namespace App\Http\Controllers;
use App\Models\Pemasukan;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ApiPemasukanController extends Controller
{
    
    public function index()
    {
        $pemasukan = Pemasukan::OrderBy('tanggal', 'DESC')->get();
        $response = [
            'message' => 'Data pemasukan diurutkan berdasarkan tanggal',
            'data' => $pemasukan
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'uraian' => ['required'],
            'jumlah' => ['required', 'numeric'],
            'tanggal' => ['required']
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
           $pemasukan =  Pemasukan::create($request->all());
           $response = [
                'message' => 'Data Berhasil Ditambah',
                'data' => $pemasukan
           ];
           return response()->json($response, Response::HTTP_CREATED);

        }catch(QueryException $e){
           return response()->json(
                ['message' => 'Gagal !'.$e->errorInfo]
            );
        }
    }

   
    public function show($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $response = [
            'message' => 'Detail Data Pemasukan',
            'data' => $pemasukan
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    public function update(Request $request, $id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'uraian' => ['required'],
            'jumlah' => ['required', 'numeric'],
            'tanggal' => ['required']
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
           $pemasukan->update($request->all());
           $response = [
                'message' => 'Data Berhasil Diupdate',
                'data' => $pemasukan
           ];
           return response()->json($response, Response::HTTP_OK);

        }catch(QueryException $e){
           return response()->json(
                ['message' => 'Gagal !'.$e->errorInfo]
            );
        }
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);

        try{
           $pemasukan->delete();
           $response = [
                'message' => 'Data Berhasil Dihapus',
           ];
           return response()->json($response, Response::HTTP_OK);

        }catch(QueryException $e){
           return response()->json(
                ['message' => 'Gagal !'.$e->errorInfo]
            );
        }

    }
}
