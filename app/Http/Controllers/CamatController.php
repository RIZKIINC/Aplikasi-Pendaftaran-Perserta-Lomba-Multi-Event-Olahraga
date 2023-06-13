<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubDistrictProfile;

class CamatController extends Controller
{
    public function index()
    {
        $camat = SubDistrictProfile::join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'sub_district_profiles.id_kecamatan')->get();

        return view('camat.index', compact('camat'));
    }
}
