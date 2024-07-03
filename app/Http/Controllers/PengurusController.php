<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role != 'A') {
            // Redirect or show 403 forbidden page
            abort(403, 'Kamu Tidak Memiliki Akses');
        }else{
            $pengurus = Pengurus::all();
        }
        //$pengurus = Pengurus::all();
        return view('pengurus.index')
                ->with('pengurus', $pengurus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Pengurus::class)){
            abort(403);
        }
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'nip'=> 'required|max:10',
            'nama'=> 'required|max:50',
            'email'=> 'required|max:50',
            'alamat'=> 'required|max:50',
            'tempat_lahir'=> 'required|max:50',
            'tanggal_lahir'=> 'required'
        ]);
        
        Pengurus::create($val);
        return redirect()->route('pengurus.index')->with('success', $val['nama']. ' Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($pengurus)
    {
        $pengurus = Pengurus::find($pengurus);
        return view('pengurus.edit')->with('pengurus', $pengurus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pengurus)
    {
        // if ($request->user()->cannot('edit', Pengurus::class)){
        //     abort(403);
        // }
        if ($request->url_foto) {
            $val = $request->validate([
                'url_foto'=> 'required|url',
                'nip'=> 'required|max:10',
                'nama'=> 'required|max:50',
                'email'=> 'required|max:50',
                'alamat'=> 'required|max:50',
                'tempat_lahir'=> 'required|max:50',
                'tanggal_lahir'=> 'required'
            ]);
        }else{
            $val = $request->validate([
                //'url_foto'=> 'required|url',
                'nip'=> 'required|max:10',
                'nama'=> 'required|max:50',
                'email'=> 'required|max:50',
                'alamat'=> 'required|max:50',
                'tempat_lahir'=> 'required|max:50',
                'tanggal_lahir'=> 'required'
            ]);
        }
        $pengurus = Pengurus::find($pengurus);
        Pengurus::where('id', $pengurus['id'])->update($val);
        return redirect()->route('pengurus.index')->with('success',$val['nama'].' Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pengurus)
    {
        $pengurus = Pengurus::find($pengurus);
        $pengurus->delete();
        return redirect()->route('pengurus.index')->with('success','Data Berhasil di Hapus');
    }
}
