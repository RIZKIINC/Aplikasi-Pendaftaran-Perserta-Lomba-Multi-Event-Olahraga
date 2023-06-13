<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'tbl_kecamatan';

    protected $fillable = [
        'id_kecamatan',
        'id_kota',
        'nama_kecamatan'
    ];
}
