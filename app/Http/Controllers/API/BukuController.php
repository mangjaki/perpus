<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        if ($buku->isEmpty()) {
            $response['message'] = 'Tidak ada Buku yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Buku ditemukan.';
        $response['data'] = $buku;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'judul'=> 'required|max:50',
            'genre'=> 'required|max:50',
            'penerbit'=> 'required|max:50',
            'stok' => 'required|integer|min:0',
            'tahun_terbit'=> 'required|integer|min:1900|max:' . date('Y')
        ]);

        $buku = Buku::create($val);
        if($buku){
            $response['success'] = true;
            $response['message'] = 'Buku berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'judul'=> 'required|max:50',
            'genre'=> 'required|max:50',
            'penerbit'=> 'required|max:50',
            'stok' => 'required|integer|min:0',
            'tahun_terbit'=> 'required|integer|min:1900|max:' . date('Y')
        ]);

        Buku::where('id', $id)->update($val);
        $response['success'] = true;
        $response['message'] = 'Buku berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $buku = Buku::where('id', $id);
        if(count($buku->get())){
            $buku->delete();
            $response['success'] = true;
            $response['message'] = 'Buku berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Buku tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } 
    }
}
