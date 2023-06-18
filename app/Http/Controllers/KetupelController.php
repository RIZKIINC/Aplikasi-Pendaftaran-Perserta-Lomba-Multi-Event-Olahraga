<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MapDistrictSport;
use App\Models\Sport;
use App\Models\Participant;
use \PDF;

class KetupelController extends Controller
{
    public function index()
    {
        $pendaftaran = DB::table('map_district_sports')->select('*', 'map_district_sports.id as id_map','map_district_sports.status as status_map')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
        ->join('sports', 'sports.id', '=', 'map_district_sports.id_sport')
        ->where('map_district_sports.status', '=', 'Verified')
        ->get();
        $countPendaftaran = count(MapDistrictSport::all());
        $cabor = MapDistrictSport::distinct()->count('id_sport');

        return view('dashboard.ketupel', compact('pendaftaran', 'countPendaftaran', 'cabor'));
    }

    public function show($id)
    {
        $sports = Sport::all();
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport', 'map_district_sports.status as status_map_district')
        ->leftjoin('sports','sports.id','=','map_district_sports.id_sport')
        ->leftjoin('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','map_district_sports.id_sub_district')
        ->where('map_district_sports.id', $id)
        ->get();
        $participants = Participant::where('id_map_district_sport', $id)->get();

        return view('ketupel.detail', compact('sports','mds', 'participants'));
    }

    public function print($id)
    {
        $sports = Sport::all();
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport', 'map_district_sports.status as status_map_district')
        ->leftjoin('sports','sports.id','=','map_district_sports.id_sport')
        ->leftjoin('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','map_district_sports.id_sub_district')
        ->where('map_district_sports.id', $id)
        ->get();
        $participants = Participant::where('id_map_district_sport', $id)->get();

        return view('ketupel.print', compact('sports','mds', 'participants'));
    }

    public function print_detail($id)
    {
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport', 'map_district_sports.status as status_map_district')
        ->leftjoin('sports','sports.id','=','map_district_sports.id_sport')
        ->leftjoin('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','map_district_sports.id_sub_district')
        ->where('map_district_sports.id', $id)
        ->get();
        // dd($mds);
        $participants = Participant::where('id_map_district_sport', $id)->get();

        $pdf = PDF::loadview('ketupel.printpdf', [
            'mds' => $mds,
            'participants' => $participants
        ])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('detail-pendafataran.pdf');
    }
}
