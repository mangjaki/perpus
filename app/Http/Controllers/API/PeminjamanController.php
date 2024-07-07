<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        if ($peminjaman->isEmpty()) {
            $response['message'] = 'Tidak ada Peminjaman yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Peminjaman ditemukan.';
        $response['data'] = $peminjaman;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'buku_id'=> 'required|exists:bukus,id',
            'anggota_id'=> 'required|exists:anggotas,id',
            'pengurus_id'=> 'nullable',
            'tanggal_pinjam'=> 'required|date',
            'tanggal_kembali'=> 'nullable|date'
        ]);

        $peminjaman = Peminjaman::create($val);
        if($peminjaman){
            $response['success'] = true;
            $response['message'] = 'Peminjaman berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $val = $request->validate([
            'buku_id'=> 'required|exists:bukus,id',
            'anggota_id'=> 'required|exists:anggotas,id',
            'pengurus_id'=> 'nullable',
            'tanggal_pinjam'=> 'required|date',
            'tanggal_kembali'=> 'nullable|date'
        ]);

        Peminjaman::where('id', $id)->update($val);
        $response['success'] = true;
        $response['message'] = 'Peminjaman berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::where('id', $id);
        if(count($peminjaman->get())){
            $peminjaman->delete();
            $response['success'] = true;
            $response['message'] = 'Peminjaman berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'RakBuku tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } 
    }
}
