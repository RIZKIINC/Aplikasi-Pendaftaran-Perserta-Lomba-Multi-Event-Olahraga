<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MapDistrictSport;
use App\Models\Sport;
use App\Models\Participant;
use \PDF;
use App\Models\SubDistrictProfile;
use App\Models\ContactPerson;

class KetupelController extends Controller
{
    public function index()
    {
        $pendaftaran = DB::table('map_district_sports')->select('*', 'map_district_sports.id as id_map', 'map_district_sports.status as status_map')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
            ->join('sports', 'sports.id', '=', 'map_district_sports.id_sport')
            ->where('map_district_sports.status', '=', 'Verified')
            ->get();
        $countPendaftaran = MapDistrictSport::distinct('id_sub_district')->count('id_sub_district');
        $cabor = MapDistrictSport::distinct()->count('id_sport');

        $result = MapDistrictSport::join('tbl_kecamatan', 'map_district_sports.id_sub_district', '=', 'tbl_kecamatan.id_kecamatan')
            ->join('sub_district_profiles', 'tbl_kecamatan.id_kecamatan', '=', 'sub_district_profiles.id_kecamatan')
            ->select('tbl_kecamatan.nama_kecamatan', 'sub_district_profiles.id_kecamatan', 'sub_district_profiles.nama_camat', 'sub_district_profiles.alamat', 'sub_district_profiles.telp_camat')
            ->groupBy('tbl_kecamatan.nama_kecamatan', 'sub_district_profiles.id_kecamatan', 'sub_district_profiles.nama_camat', 'sub_district_profiles.alamat', 'sub_district_profiles.telp_camat')
            ->get();

        return view('dashboard.ketupel', compact('pendaftaran', 'countPendaftaran', 'cabor', 'result'));
    }

    public function show($id)
    {
        $profile = MapDistrictSport::join('tbl_kecamatan', 'map_district_sports.id_sub_district', '=', 'tbl_kecamatan.id_kecamatan')
            ->join('sub_district_profiles', 'tbl_kecamatan.id_kecamatan', '=', 'sub_district_profiles.id_kecamatan')
            ->select('map_district_sports.id_sub_district', 'tbl_kecamatan.nama_kecamatan', 'sub_district_profiles.id', 'sub_district_profiles.nama_camat', 'sub_district_profiles.alamat', 'sub_district_profiles.telp_camat', 'sub_district_profiles.kode_kecamatan', 'sub_district_profiles.kodepos', 'sub_district_profiles.email')
            ->where('map_district_sports.id_sub_district', $id)
            ->first();

        $cp = ContactPerson::where('id_profile', $profile->id)->first();

        $sports = MapDistrictSport::join('sports', 'map_district_sports.id_sport', '=', 'sports.id')
            ->where('map_district_sports.id_sub_district', $id)
            ->where('map_district_sports.status', 'Verified')
            ->select('map_district_sports.*', 'sports.sport_name')
            ->get();


        return view('ketupel.detail', compact('profile', 'cp', 'sports'));
        // return $profile;
        // return $cp;
        // return $sports;
    }

    public function show_peserta($id)
    {
        $data = MapDistrictSport::find($id);

        if ($data) {
            $profile = MapDistrictSport::join('tbl_kecamatan', 'map_district_sports.id_sub_district', '=', 'tbl_kecamatan.id_kecamatan')
                ->join('sports', 'map_district_sports.id_sport', '=', 'sports.id')
                ->select('tbl_kecamatan.nama_kecamatan', 'sports.sport_name', 'map_district_sports.*')
                ->where('map_district_sports.id', $data->id)
                ->first();
        } else {
            // Handle the case when the data is not found
            $profile = null;
        }

        $peserta = Participant::where('id_map_district_sport', $id)->get();

        return view('ketupel.peserta', compact('profile', 'peserta'));
        // return $profile;
        // return $peserta;
        // return $data;
    }

    public function print($id)
    {
        $profile = MapDistrictSport::join('tbl_kecamatan', 'map_district_sports.id_sub_district', '=', 'tbl_kecamatan.id_kecamatan')
            ->join('sub_district_profiles', 'tbl_kecamatan.id_kecamatan', '=', 'sub_district_profiles.id_kecamatan')
            ->select('tbl_kecamatan.nama_kecamatan', 'sub_district_profiles.id', 'sub_district_profiles.nama_camat', 'sub_district_profiles.alamat', 'sub_district_profiles.telp_camat', 'sub_district_profiles.kode_kecamatan', 'sub_district_profiles.kodepos', 'sub_district_profiles.email')
            ->where('map_district_sports.id_sub_district', $id)
            ->first();

        $cp = ContactPerson::where('id_profile', $profile->id)->first();

        $sports = MapDistrictSport::join('sports', 'map_district_sports.id_sport', '=', 'sports.id')
            ->where('map_district_sports.id_sub_district', $id)
            ->where('map_district_sports.status', 'Verified')
            ->select('map_district_sports.*', 'sports.sport_name')
            ->get();

        $cabor = $sports->pluck('sport_name')->unique();
        $id_kecamatan = $sports->pluck('id_sub_district')->unique();

        return view('ketupel.print', compact('profile', 'cp', 'sports', 'cabor', 'id_kecamatan'));
        // return $profile;
        // return $cp;
        // return $sports;
        // return $cabor;
        // return $id_kecamatan;
    }

    public function print_peserta($id)
    {
        $data = MapDistrictSport::find($id);

        if ($data) {
            $profile = MapDistrictSport::join('tbl_kecamatan', 'map_district_sports.id_sub_district', '=', 'tbl_kecamatan.id_kecamatan')
                ->join('sports', 'map_district_sports.id_sport', '=', 'sports.id')
                ->select('tbl_kecamatan.nama_kecamatan', 'sports.sport_name', 'map_district_sports.*')
                ->where('map_district_sports.id', $data->id)
                ->first();
        } else {
            // Handle the case when the data is not found
            $profile = null;
        }

        $peserta = Participant::where('id_map_district_sport', $id)->get();

        return view('ketupel.print-peserta', compact('profile', 'peserta', 'data'));
        // return $profile;
        // return $peserta;
    }
}
