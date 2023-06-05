<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = DB::table('event_cabor')->get();

        return view('admin.event.event', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //tambah event cabor
        $event = DB::table('event_cabor')->get();

        return view ('admin.event.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('event_cabor')->insert([
            'nomor_olahraga' => $request->nomor_olahraga,
            'nama_event' =>  bcrypt($request->nama_event),
            'jenis_kelamin' => $request->jenis_kelamin,
       
        ]);
        return redirect('admin/event');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //detail
        $event = DB::table('event_cabor')->get();

        return view('admin.event.detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
