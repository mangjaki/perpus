<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $fillable = [
        'url_foto','nip', 'nama','email','alamat','tempat_lahir', 'tanggal_lahir'
    ];
    
}
