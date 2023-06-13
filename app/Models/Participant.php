<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_map_district_sport',
        'participant_name',
        'participant_dob',
        'participant_gender',
        'participant_address',
        'participant_domicile',
        'participant_status',
        'no_ktp',
        'no_kk',
        'no_akte',
        'no_ijazah',
        'no_class',
        'pas_foto',
    ];
    public $incrementing = true;
}
