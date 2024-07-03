<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rakbuku extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_rak','buku_id', 'tingkat'
    ];

    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
