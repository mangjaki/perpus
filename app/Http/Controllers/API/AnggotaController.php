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
            $response['message'] = 'Tidak ada Buku yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Buku ditemukan.';
        $response['data'] = $anggota;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    
}
