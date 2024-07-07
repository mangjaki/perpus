<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengurus;
use App\Models\Rakbuku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index')
                ->with('peminjaman', $peminjaman);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rakbuku = Rakbuku::all();
        $anggota = Anggota::all();
        $buku = Buku::all();
        $pengurus = Pengurus::all();
        return view('peminjaman.create')->with('anggota', $anggota)->with('buku', $buku)->with('rakbuku', $rakbuku)->with('pengurus', $pengurus);
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
            'buku_id'=> 'required|exists:bukus,id',
            'anggota_id'=> 'required|exists:anggotas,id',
            'rak_id'=> 'required|exists:rakbukus,id',
            'pengurus_id'=> 'nullable',
            'tanggal_pinjam'=> 'required|date',
            'tanggal_kembali'=> 'nullable|date'
        ]);

        $buku = Buku::find($val['buku_id']);

        if ($buku->stok < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }

        Peminjaman::create($val);
        $buku->decrement('stok');   
        return redirect()->route('peminjaman.index')->with('success','Peminjaman ', $val['buku_id'].' Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $rakbuku = Rakbuku::all();
        $anggota = Anggota::all();
        $buku = Buku::all();
        $pengurus = Pengurus::all();
        return view('peminjaman.edit')->with('anggota', $anggota)->with('buku', $buku)->with('rakbuku', $rakbuku)->with('pengurus', $pengurus)->with('peminjaman', $peminjaman);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $val = $request->validate([
            'buku_id'=> 'required',
            'anggota_id'=> 'required',
            'rak_id'=> 'required',
            'pengurus_id'=> 'required',
            'tanggal_pinjam'=> 'required|date',
            'tanggal_kembali'=> 'nullable|date'
        ]);

        // Jika buku diganti, kembalikan stok buku lama dan kurangi stok buku baru
        if ($peminjaman->buku_id != $request->buku_id) {
            $bukuLama = Buku::find($peminjaman->buku_id);
            if ($bukuLama) {
                $bukuLama->increment('stok');
            }

            $bukuBaru = Buku::find($request->buku_id);
            if ($bukuBaru) {
                $bukuBaru->decrement('stok');
            }
        }

        Peminjaman::where('id', $peminjaman['id'])->update($val);
        return redirect()->route('peminjaman.index')->with('success','Peminjaman ', $val['buku_id'].' Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($peminjaman)
    {
        $peminjaman = Peminjaman::find($peminjaman);
        $buku = Buku::find($peminjaman->buku_id);
        if ($buku) {
            $buku->increment('stok');
        }
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success','Data Berhasil di Hapus!');
    }
}
