<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Rakbuku;
use Illuminate\Http\Request;

class RakbukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rakbuku = Rakbuku::all();
        return view('rak.index')->with('rakbuku', $rakbuku);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::all();
        return view('rak.create')->with('buku', $buku);
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
            'kode_rak'=> 'required|max:50',
            'buku_id'=> 'required',
            'tingkat'=> 'required|max:50'
        ]);

        Rakbuku::create($val);
        return redirect()->route('rak.index')->with('success', $val['kode_rak'].' Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rakbuku $rakbuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $rakbuku)
    {
        $rakbuku = Rakbuku::find($rakbuku);
        $buku = Buku::all();
        return view('rak.edit')->with('buku', $buku)->with('rakbuku', $rakbuku);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$rakbuku)
    {
        $val = $request->validate([
            'kode_rak'=> 'required|max:50',
            'buku_id'=> 'required',
            'tingkat'=> 'required|max:50'
        ]);
        $rakbuku = Rakbuku::find($rakbuku);
        Rakbuku::where('id', $rakbuku['id'])->update($val);
        return redirect()->route('rak.index')->with('success',$val['kode_rak'].' Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rakbuku)
    {
        $rakbuku = Rakbuku::find($rakbuku);
        $rakbuku->delete();
        return redirect()->route('rak.index')->with('success','Data Berhasil di Hapus!');
    }
}
