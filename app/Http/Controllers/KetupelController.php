<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapDistrictSport;

class KetupelController extends Controller
{
    public function index()
    {
        $pendaftaran = MapDistrictSport::join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
            ->join('sports', 'sports.id', '=', 'map_district_sports.id_sport')
            ->get();
        $countPendaftaran = count(MapDistrictSport::all());
        $cabor = MapDistrictSport::distinct()->count('id_sport');

        return view('dashboard.ketupel', compact('pendaftaran', 'countPendaftaran', 'cabor'));
    }
}
