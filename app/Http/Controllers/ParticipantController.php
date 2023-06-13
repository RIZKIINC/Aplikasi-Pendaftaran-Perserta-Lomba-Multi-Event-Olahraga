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
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport')
        ->join('sports', 'sports.id', '=', 'map_district_sports.id_sport')
        ->where('map_district_sports.id', $id)
        ->get();
        // dd($mds);

        return view('user.pendaftaran.pendaftaranpartisipan', compact('mds', 'index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $mds = MapDistrictSport::select('*', 'map_district_sports.id as id_map_district_sport')
        ->join('sports', 'sports.id', '=', 'map_district_sports.id_sport')
        ->where('map_district_sports.id', $id)
        ->get();

        $images = [];
        foreach ($request->file('pas_foto') as $key => $file)
        {
            // Get Filename
            $filename = $file->getClientOriginalName();
            //Get just extension
            $extension = $file->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $file->storeAs('public/Pas Foto',$fileNameToStore);
            array_push($images, $fileNameToStore);
        }

        $count_participant = (int)$request->participant_count;
        
        for($i = 0; $i < $count_participant; $i++) {
            $participant = new Participant;
            $participant -> id_map_district_sport = $id;
            $participant -> participant_name = $request -> participant_name[$i];
            $participant -> participant_dob = $request -> participant_dob[$i];
            $participant -> participant_gender = $request -> participant_gender[$i];
            $participant -> participant_address = $request -> participant_address[$i];
            $participant -> participant_domicile = $request -> participant_domicile[$i];
            $participant -> no_ktp = $request -> no_ktp[$i];
            $participant -> no_kk = $request -> no_kk[$i];
            $participant -> no_akte = $request -> no_akte[$i];
            $participant -> no_ijazah = $request -> no_ijazah[$i];
            $participant -> pas_foto = $images[$i];
            $participant -> save();
        }


        if(!$participant->id){
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
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
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
