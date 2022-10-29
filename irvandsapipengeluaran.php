<?php

namespace App\Http\Controllers;
use App\Models\Pengeluaran;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiPengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::OrderBy('tanggal', 'DESC')->get();
        $response = [
            'message' => 'Data pengeluaran diurutkan berdasarkan tanggal',
            'data' => $pengeluaran
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'uraian' => ['required'],
            'jumlah' => ['required', 'numeric'],
            'deskripsi' => ['required'],
            'tanggal' => ['required']
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
           $pengeluaran =  Pengeluaran::create($request->all());
           $response = [
                'message' => 'Data Berhasil Ditambah',
                'data' => $pengeluaran
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
        $pengeluaran = Pengeluaran::findOrFail($id);
        $response = [
            'message' => 'Detail Data Pengeluaran',
            'data' => $pengeluaran
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    public function update(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'uraian' => ['required'],
            'jumlah' => ['required', 'numeric'],
            'tanggal' => ['required']
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
           $pengeluaran->update($request->all());
           $response = [
                'message' => 'Data Berhasil Diupdate',
                'data' => $pengeluaran
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
        $pengeluaran = Pengeluaran::findOrFail($id);

        try{
           $pengeluaran->delete();
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
