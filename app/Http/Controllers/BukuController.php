<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Contracts\Service\Attribute\Required;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index')
                ->with('buku', $buku);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Buku::class)){
            abort(403);
        }
        $val = $request->validate([
            'url_foto'=> 'required|url',
            'judul'=> 'required|max:50',
            'genre'=> 'required|max:50',
            'penerbit'=> 'required|max:50',
            'stok' => 'required|integer|min:0',
            'tahun_terbit'=> 'required|integer|min:1900|max:' . date('Y')
        ]);
        Buku::create($val);
        return redirect()->route('buku.index')->with('success', $val['judul'].' Berhasi di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit')->with('buku', $buku);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        // if ($request->user()->cannot('edit', Buku::class)){
        //     abort(403, 'Kamu tidak memiliki Akses');
        // }
        
        if($request->url_foto){
            $val = $request->validate([
                'url_foto'=> 'required|url',
                'judul'=> 'required|max:50',
                'genre'=> 'required|max:50',
                'penerbit'=> 'required|max:50',
                'stok' => 'required|integer|min:0',
                'tahun_terbit'=> 'required|integer|min:1900|max:' . date('Y')
        ]);

        } else{
            $val = $request->validate([
                //'url_foto'=> 'required|url',
                'judul'=> 'required|max:50',
                'genre'=> 'required|max:50',
                'penerbit'=> 'required|max:50',
                'stok' => 'required|integer|min:0',
                'tahun_terbit'=> 'required|integer|min:1900|max:' . date('Y')
        ]);
        }

        Buku::where('id', $buku['id'])->update($val);
        return redirect()->route('buku.index')->with('success',$val['judul'].' Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //dd($buku);
        $buku->delete(); //hapus data buku
        return redirect()->route('buku.index')->with('success','Data Buku Berhasil di Hapus');
    }
}
