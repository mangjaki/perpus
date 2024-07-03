<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable =[
        'anggota_id','buku_id','rak_id','pengurus_id','tanggal_pinjam','tanggal_kembali'
    ];

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id','id');
    }
    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id','id');
    }
    public function pengurus(){
        return $this->belongsTo(Pengurus::class, 'pengurus_id','id');
    }
    public function rakbuku(){
        return $this->belongsTo(Rakbuku::class, 'rak_id','id');
    }
}
