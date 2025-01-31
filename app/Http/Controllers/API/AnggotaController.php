<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        if ($anggota->isEmpty()) {
            $response['message'] = 'Tidak ada Anggota yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Anggota ditemukan.';
        $response['data'] = $anggota;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'npm'=> 'required|max:10',
            'nama'=> 'required|max:50',
            'email'=> 'required|max:50',
            'alamat'=> 'required|max:50',
            'tempat_lahir'=> 'required|max:50',
            'tanggal_lahir'=> 'required'
        ]);

        $anggota = Anggota::create($val);
        if($anggota){
            $response['success'] = true;
            $response['message'] = 'Anggota berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'npm'=> 'required|max:10',
            'nama'=> 'required|max:50',
            'email'=> 'required|max:50',
            'alamat'=> 'required|max:50',
            'tempat_lahir'=> 'required|max:50',
            'tanggal_lahir'=> 'required'
        ]);

        Anggota::where('id', $id)->update($val);
        $response['success'] = true;
        $response['message'] = 'Anggota berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $anggota = Anggota::where('id', $id);
        if(count($anggota->get())){
            $anggota->delete();
            $response['success'] = true;
            $response['message'] = 'Anggota berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Anggota tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } 
    }
}
