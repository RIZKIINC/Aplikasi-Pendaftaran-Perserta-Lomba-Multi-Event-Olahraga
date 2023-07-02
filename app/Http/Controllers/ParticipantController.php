<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\MapDistrictSport;
use App\Models\Sport;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    public function index2()
    {
        $participant = Participant::get();

        return view('participant.index', compact('participant'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();
        $kecamatan = Kecamatan::all();
        return view('user.pendaftaran.pendaftaranpartisipan2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $index = 1;
        $sports = Sport::all();
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport', 'map_district_sports.status as map_district_sport_status')
            ->join('sports', 'sports.id', '=', 'map_district_sports.id_sport')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
            ->where('map_district_sports.id', $id)
            ->get();
        $participants = Participant::where('id_map_district_sport', $id)
            ->get();
        $count_participant = count($participants);
        // dd($mds);

        return view('user.pendaftaran.pendaftaranpartisipan', compact('mds', 'index', 'sports', 'count_participant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $filled = count($request->pas_foto);

        $images = [];
        $ktpImages = [];
        $kkImages = [];
        $ijazahImages = [];
        $akteImages = [];

        foreach ($request->file('pas_foto') as $key => $file) {
            // Get Filename
            $filename = $file->getClientOriginalName();
            //Filename to Store
            $fileNameToStore = date('dmyHis') . '-' . $id . '-' . $filename;
            //Upload Image
            $path = $file->storeAs('public/Pas_Foto', $fileNameToStore);
            array_push($images, $fileNameToStore);
        }

        foreach ($request->file('no_ktp_image') as $key => $file) {
            $filename = $file->getClientOriginalName();
            $fileNameToStore = date('dmyHis') . '-' . $id . '-ktp-' . $filename;
            $path = $file->storeAs('public/KTP', $fileNameToStore);
            array_push($ktpImages, $fileNameToStore);
        }

        foreach ($request->file('no_kk_image') as $key => $file) {
            $filename = $file->getClientOriginalName();
            $fileNameToStore = date('dmyHis') . '-' . $id . '-kk-' . $filename;
            $path = $file->storeAs('public/KK', $fileNameToStore);
            array_push($kkImages, $fileNameToStore);
        }

        foreach ($request->file('no_akte_image') as $key => $file) {
            $filename = $file->getClientOriginalName();
            $fileNameToStore = date('dmyHis') . '-' . $id . '-ijazah-' . $filename;
            $path = $file->storeAs('public/Ijazah', $fileNameToStore);
            array_push($ijazahImages, $fileNameToStore);
        }

        foreach ($request->file('no_ijazah_image') as $key => $file) {
            $filename = $file->getClientOriginalName();
            $fileNameToStore = date('dmyHis') . '-' . $id . '-akte-' . $filename;
            $path = $file->storeAs('public/Akte', $fileNameToStore);
            array_push($akteImages, $fileNameToStore);
        }

        for ($i = 0; $i < $filled; $i++) {
            $participant = new Participant;
            $participant->id_map_district_sport = $id;
            $participant->participant_name = $request->participant_name[$i];
            $participant->participant_dob = $request->participant_dob[$i];
            $participant->participant_gender = $request->participant_gender[$i];
            $participant->participant_address = $request->participant_address[$i];
            $participant->participant_domicile = $request->participant_domicile[$i];
            $participant->no_ktp = $request->no_ktp[$i];
            $participant->no_kk = $request->no_kk[$i];
            $participant->no_akte = $request->no_akte[$i];
            $participant->no_ijazah = $request->no_ijazah[$i];
            $participant->pas_foto = $images[$i];
            $participant->fotoktp = $ktpImages[$i];
            $participant->fotokk = $kkImages[$i];
            $participant->fotoijazah = $ijazahImages[$i];
            $participant->fotoakte = $akteImages[$i];
            $participant->save();
        }


        if (!$participant->id) {
            return redirect('pendaftaran/index')->with('error', 'Pendaftaran partisipan gagal.');
        }
        return redirect('mapdistrictsport/index')->with('success', 'Pendaftaran berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sports = Sport::all();
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport', 'map_district_sports.status as status_map_district')
            ->leftjoin('sports', 'sports.id', '=', 'map_district_sports.id_sport')
            ->leftjoin('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'map_district_sports.id_sub_district')
            ->where('map_district_sports.id', $id)
            ->get();
        $participants = Participant::where('id_map_district_sport', $id)
            ->get();
        // dd($mds);

        return view('user.pendaftaran.pendaftaranedit', compact('sports', 'mds', 'participants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $participant = Participant::find($id);
        // return $participant;

        // Get File
        if ($file = $request->file('pas_foto')) {
            if (Storage::exists('public/Pas_Foto' . '/' . $participant->pas_foto)) {
                Storage::delete('public/Pas_Foto' . '/' . $participant->pas_foto);
            }
            // Get Filename
            $filename = $file->getClientOriginalName();
            //Get just extension
            $extension = $file->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $file->storeAs('public/Pas_Foto', $fileNameToStore);
            $participant->pas_foto = $fileNameToStore;
        }

        // Update fotoktp
        if ($file = $request->file('no_ktp_image')) {
            if (Storage::exists('public/KTP/' . $participant->fotoktp)) {
                Storage::delete('public/KTP/' . $participant->fotoktp);
            }
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = date('dmyHis') . '-' . $id . '-' . $filename;
            $path = $file->storeAs('public/KTP', $fileNameToStore);
            $participant->fotoktp = $fileNameToStore;
        }

        // Update fotokk
        if ($file = $request->file('no_kk_image')) {
            if (Storage::exists('public/KK/' . $participant->fotokk)) {
                Storage::delete('public/KK/' . $participant->fotokk);
            }
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = date('dmyHis') . '-' . $id . '-' . $filename;
            $path = $file->storeAs('public/KK', $fileNameToStore);
            $participant->fotokk = $fileNameToStore;
        }

        // Update fotoakte
        if ($file = $request->file('no_akte_image')) {
            if (Storage::exists('public/Akte/' . $participant->fotoakte)) {
                Storage::delete('public/Akte/' . $participant->fotoakte);
            }
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = date('dmyHis') . '-' . $id . '-' . $filename;
            $path = $file->storeAs('public/Akte', $fileNameToStore);
            $participant->fotoakte = $fileNameToStore;
        }

        // Update fotoijazah
        if ($file = $request->file('no_ijazah_image')) {
            if (Storage::exists('public/Ijazah/' . $participant->fotoijazah)) {
                Storage::delete('public/Ijazah/' . $participant->fotoijazah);
            }
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = date('dmyHis') . '-' . $id . '-' . $filename;
            $path = $file->storeAs('public/Ijazah', $fileNameToStore);
            $participant->fotoijazah = $fileNameToStore;
        }

        $participant->participant_name = $request->participant_name;
        $participant->participant_dob = $request->participant_dob;
        $participant->participant_gender = $request->participant_gender;
        $participant->participant_address = $request->participant_address;
        $participant->participant_domicile = $request->participant_domicile;
        $participant->no_ktp = $request->no_ktp;
        $participant->no_kk = $request->no_kk;
        $participant->no_akte = $request->no_akte;
        $participant->no_ijazah = $request->no_ijazah;
        $mapDistrictSport = MapDistrictSport::find($participant->id_map_district_sport);
        $mapDistrictSport->status = "On Process";
        $mapDistrictSport->save();
        $participant->save();

        return redirect('participant/edit/' . $participant->id_map_district_sport)->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
