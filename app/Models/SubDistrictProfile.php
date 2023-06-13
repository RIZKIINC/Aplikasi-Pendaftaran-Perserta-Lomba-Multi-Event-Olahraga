<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrictProfile extends Model
{
    use HasFactory;
    protected $table = 'sub_district_profiles';

    protected $fillable = [
        'id_user',
        'id_kecamatan',
        'kode_kecamatan'
    ];
}
