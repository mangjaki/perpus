<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::all();
        if ($pengurus->isEmpty()) {
            $response['message'] = 'Tidak ada Pengurus yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Pengurus ditemukan.';
        $response['data'] = $pengurus;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'nip'=> 'required|max:10',
            'nama'=> 'required|max:50',
            'email'=> 'required|max:50',
            'alamat'=> 'required|max:50',
            'tempat_lahir'=> 'required|max:50',
            'tanggal_lahir'=> 'required'
        ]);

        $pengurus = Pengurus::create($val);
        if($pengurus){
            $response['success'] = true;
            $response['message'] = 'Pengurus berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'nip'=> 'required|max:10',
            'nama'=> 'required|max:50',
            'email'=> 'required|max:50',
            'alamat'=> 'required|max:50',
            'tempat_lahir'=> 'required|max:50',
            'tanggal_lahir'=> 'required'
        ]);

        Pengurus::where('id', $id)->update($val);
        $response['success'] = true;
        $response['message'] = 'Pengurus berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::where('id', $id);
        if(count($pengurus->get())){
            $pengurus->delete();
            $response['success'] = true;
            $response['message'] = 'Pengurus berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Pengurus tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } 
    }
}
