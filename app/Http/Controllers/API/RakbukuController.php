<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Rakbuku;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RakbukuController extends Controller
{
    public function index()
    {
        $rakbuku = Rakbuku::all();
        if ($rakbuku->isEmpty()) {
            $response['message'] = 'Tidak ada RakBuku yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'RakBuku ditemukan.';
        $response['data'] = $rakbuku;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'kode_rak'=> 'required|max:50',
            'tingkat'=> 'required|max:50'
        ]);

        $rakbuku = Rakbuku::create($val);
        if($rakbuku){
            $response['success'] = true;
            $response['message'] = 'RakBuku berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $val = $request->validate([
            'kode_rak'=> 'required|max:50',
            'tingkat'=> 'required|max:50'
        ]);

        RakBuku::where('id', $id)->update($val);
        $response['success'] = true;
        $response['message'] = 'RakBuku berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $rakbuku = RakBuku::where('id', $id);
        if(count($rakbuku->get())){
            $rakbuku->delete();
            $response['success'] = true;
            $response['message'] = 'RakBuku berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'RakBuku tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } 
    }
}
