<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event_cabor';

    protected $fillable = [
        'nomor_olahraga',
        'nama_event',
        'jenis_kelamin',
    ];
}
