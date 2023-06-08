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
        $events = DB::table('event_cabor')->get();

        return view('admin.event.event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = DB::table('event_cabor')->get();
        
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('event_cabor')->insert([
            'nomor_olahraga' => $request->nomor_olahraga,
            'nama_event' => $request->nama_event,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = DB::table('event_cabor')->find($id);

        return view('admin.event.detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = DB::table('event_cabor')->find($id);

        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('event_cabor')->where('id', $id)->update([
            'nomor_olahraga' => $request->nomor_olahraga,
            'nama_event' => $request->nama_event,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('event_cabor')->where('id', $id)->delete();

        return redirect()->route('event.index');
    }
}
