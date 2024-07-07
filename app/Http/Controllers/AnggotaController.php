<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index')
                ->with('anggota', $anggota);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Anggota::class)){
            abort(403);
        }
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'npm'=> 'required|max:10',
            'nama'=> 'required|max:50',
            'email'=> 'required|max:50',
            'alamat'=> 'required|max:50',
            'tempat_lahir'=> 'required|max:50',
            'tanggal_lahir'=> 'required'
        ]);

        Anggota::create($val);
        return redirect()->route('anggota.index')->with('success', $val['nama']. ' Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($anggota)
    {
        $anggota = Anggota::find($anggota);
        return view('anggota.edit')->with('anggota', $anggota);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $anggota)
    {
        // if ($request->user()->cannot('edit', Anggota::class)){
        //     abort(403);
        // }
        if ($request->url_foto) {
            $val = $request->validate([
                'url_foto'=> 'required|url',
                'npm'=> 'required|max:10',
                'nama'=> 'required|max:50',
                'email'=> 'required|max:50',
                'alamat'=> 'required|max:50',
                'tempat_lahir'=> 'required|max:50',
                'tanggal_lahir'=> 'required'
            ]);
        }else{
            $val = $request->validate([
                //'url_foto'=> 'required|url',
                'npm'=> 'required|max:10',
                'nama'=> 'required|max:50',
                'email'=> 'required|max:50',
                'alamat'=> 'required|max:50',
                'tempat_lahir'=> 'required|max:50',
                'tanggal_lahir'=> 'required'
            ]);
        }
        $anggota = Anggota::find($anggota);
        Anggota::where('id', $anggota['id'])->update($val);
        return redirect()->route('anggota.index')->with('success',$val['nama'].' Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($anggota)
    {
        // if (auth()->user()->cannot('delete', Anggota::class)){
        //     abort(403, 'Kamu tidak Memiliki Akses');
        // }
        $anggota = Anggota::find($anggota);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success','Data Berhasil di Hapus');
    }
}
