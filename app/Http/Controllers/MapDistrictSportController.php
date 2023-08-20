<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Participant;
use App\Models\MapDistrictSport;
use App\Models\SubDistrictProfile;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MapDistrictSportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = SubDistrictProfile::where('id_user', auth()->user()->id)->first();

        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sports')
            ->join('sports', 'sports.id', '=', 'map_district_sports.id_sport')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
            ->where('id_sub_district', $user->id_kecamatan)
            ->get();

        return view('user.pendaftaran.pendaftarandata', compact('mds'));
        // return $mds;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = Sport::all();
        $kecamatan = Kecamatan::all();


        return view('user.pendaftaran.pendaftaran', compact('sports', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Find the ID of the user's kecamatan
    $findSubDistrict = SubDistrictProfile::select('id_kecamatan')->where('id_user', '=', Auth::user()->id)->get();
    $id_sub_district = $findSubDistrict[0]->id_kecamatan;

    // Check if the group is already registered for the given sport, sub-district, group name, couch name, and keterangan
    $existingMds = MapDistrictSport::where('id_sport', '=', $request->id_sport)
        ->where('id_sub_district', '=', $id_sub_district)
        ->where('group_name', '=', $request->group_name)
        ->where('coach_name', '=', $request->coach_name)
        ->where('keterangan', '=', $request->keterangan)
        ->first();

    if ($existingMds) {
        return redirect('/mapdistrictsport/index')->with('error', 'Nama grup atau pelatih telah terdaftar pada cabang olahraga ini.');
    }

    // Create a new MapDistrictSport entry
    $mds = new MapDistrictSport;
    $mds->id_sub_district = $id_sub_district;
    $mds->id_sport = $request->id_sport;
    $mds->group_name = $request->group_name;
    $mds->coach_name = $request->coach_name;
    $mds->keterangan = $request->keterangan;
    $mds->status = "On Process";
    $mds->save();

    if (!$mds->id) {
        return redirect('/participant/index')->with('error', 'Pendaftaran grup gagal.');
    }

    return redirect('participant/create/' . $mds->id)->with('success', 'Tambahkan partisipan dalam grup.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MapDistrictSport  $mapDistrictSport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sports = Sport::all();
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport', 'map_district_sports.status as status_map_district')
            ->leftjoin('sports', 'sports.id', '=', 'map_district_sports.id_sport')
            ->leftjoin('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
            ->where('map_district_sports.id', $id)
            ->get();
        $participants = Participant::where('id_map_district_sport', $id)
            ->get();

        return view('user.pendaftaran.pendaftarandetail', compact('sports', 'mds', 'participants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MapDistrictSport  $mapDistrictSport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sports = Sport::all();
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport', 'map_district_sports.status as status_map_district', 'map_district_sports.keterangan as ket_map_district')
            ->leftjoin('sports', 'sports.id', '=', 'map_district_sports.id_sport')
            ->leftjoin('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
            ->where('map_district_sports.id', $id)
            ->get();
        $participants = Participant::where('id_map_district_sport', $id)
            ->get();
    
        return view('user.pendaftaran.pendaftaranedit', compact('sports', 'mds', 'participants'));
    }

  /**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\MapDistrictSport  $mapDistrictSport
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $mds = MapDistrictSport::find($id);
    $mds->coach_name = $request->coach_name; // Update nama coach
    $mds->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Nama coach berhasil diperbarui.');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\MapDistrictSport  $mapDistrictSport
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $participants = Participant::where('id_map_district_sport', $id)->get();

    foreach ($participants as $participant) {
        if (Storage::exists('public/Pas_Foto' . '/' . $participant->pas_foto)) {
            Storage::delete('public/Pas_Foto' . '/' . $participant->pas_foto);
        }
        $participant->delete();
    }

    MapDistrictSport::find($id)->delete();

    return redirect('/mapdistrictsport/index')->with('success', 'Pendaftaran berhasil dihapus.');
}
    
}
