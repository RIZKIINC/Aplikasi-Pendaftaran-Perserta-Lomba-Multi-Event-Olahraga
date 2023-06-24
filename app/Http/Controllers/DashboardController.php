<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sport;
use App\Models\Participant;
use App\Models\MapDistrictSport;
use App\Models\SubDistrictProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        $admin = count(User::where('id_role', '=', '1')->get());
        $camat = count(User::where('id_role', '=', '3')->get());
        $peserta = count(Participant::all());
        $sport = count(Sport::all());

        return view('dashboard.admin', compact('admin', 'camat', 'peserta', 'sport'));
    }

    public function adminCount()
    {
        $admin = count(User::where('id_role', '=', '1')->get());
        $camat = count(User::where('id_role', '=', '3')->get());
        $peserta = count(Participant::all());
        $sport = count(Sport::all());

        return view('dashboard.admin', compact('admin', 'camat', 'peserta', 'sport'));
    }

    public function camatCount()
    {
        // dd(Auth::user()->id_role);
        $admin = count(User::where('id_role', '=', '1')->get());
        $camat = count(User::where('id_role', '=', '3')->get());
        $us = auth()->user()->id;
        $user = User::find($us);
        $peserta = count(Participant::all());

        $team = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sports')
            ->join('sports', 'sports.id', '=', 'map_district_sports.id_sport')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
            ->where('id_sub_district', 'tbl_kecamatan->id_kecamatan')
            ->count();
        $sport = count(Sport::all());

        return view('dashboard.camat', compact('admin', 'camat', 'peserta', 'sport', 'team'));
    }
}
