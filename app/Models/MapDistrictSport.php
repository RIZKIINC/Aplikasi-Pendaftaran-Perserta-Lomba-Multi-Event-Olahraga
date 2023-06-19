<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;

class MapDistrictSport extends Model
{
    use HasFactory;

    protected $table = 'map_district_sports';
    protected $primaryKey = 'id';
    protected $fillable = [
        "id_sub_district",
        "id_sport",
        'group_name',
        'status',
        'keterangan'
    ];
    public $incrementing = true;

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-m-y H:i');
    }

    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d-m-y H:i');
    }
}
