<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapDistrictSport;
use App\Models\Participant;
use App\Models\Sport;
use Illuminate\Support\Facades\DB;

class VerifikasiPendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = DB::table('map_district_sports')->select('*', 'map_district_sports.id as id_map_district_sport', 'map_district_sports.status as status_map_district_sport')
        ->leftjoin('sports','sports.id','=','map_district_sports.id_sport')
        ->join(
        'tbl_kecamatan', 
        'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
        ->get();
        // dd($pendaftaran);
        return view('admin.verivikasipendaftaran', compact('pendaftaran'));
    }

    public function indexDetail($id)
    {
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport','map_district_sports.status as status_map_district_sport')
        ->leftjoin('sports','sports.id','=','map_district_sports.id_sport')
        ->leftjoin('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','map_district_sports.id_sub_district')
        ->where('map_district_sports.id', $id)
        ->get();
        $sports = Sport::all();
        $participants = DB::table('participants')->select('*', 'participants.id as id_participant')
        ->leftjoin('map_district_sports','participants.id_map_district_sport','=','map_district_sports.id')
        ->where('participants.id_map_district_sport', $id)
        ->get();
        return view('admin.detailpendaftaran', compact('mds', 'participants','sports'));
    }

    public function verifikasiPendaftaran(Request $post)
    {
        DB::table('map_district_sports')->where('id', $post->id)->update([
			'status' => $post->status,
			'keterangan' => $post->keterangan,
        ]);
        return redirect('verifkasi-pendaftaran/index')->with('success', 'Data berhasil diperbarui.');
    }

}
