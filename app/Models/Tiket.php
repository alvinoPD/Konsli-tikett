<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    /** 
     * Fillable
     * @var array
     * 
    */

    protected $fillable = [
        'Nama',
        'harga',
        'Tanggal',
        'Lokasi',
        'deskripsi',

    ];
}
