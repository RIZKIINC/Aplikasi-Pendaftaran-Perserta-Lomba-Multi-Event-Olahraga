<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Cabor;
use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event_cabor = DB::table('event_cabor')->get();
        
        return view('admin.event.event', compact('event_cabor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event_cabor = DB::table('event_cabor')->get();
        $cabor = DB::table('cabang_olahraga')->pluck('cabor');
        
        return view('admin.event.create', compact('event_cabor', 'cabor'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('event_cabor')->insert([
            'cabang_olahraga_id' => $request->cabang_olahraga_id,
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
        $event_cabor = DB::table('event_cabor')->find($id);

        return view('admin.event.detail', compact('event_cabor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event_cabor = DB::table('event_cabor')->find($id);
        $cabor = DB::table('cabang_olahraga')->pluck('cabor');

        return view('admin.event.edit', compact('event_cabor', 'cabor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('event_cabor')->where('id', $id)->update([
            'cabang_olahraga_id' => $request->cabang_olahraga_id,
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
