<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Cabor;
use App\Models\Event;

use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = Peserta::count();
        $cabor = Cabor::count();
        $event = Event::count();

        // Menghitung Deadline
        $tanggalInput = '2023-06-30';
        $tanggal = Carbon::createFromFormat('Y-m-d', $tanggalInput);
        $tanggalSekarang = Carbon::now();

        // Hitung selisih hari
        $selisihHari = $tanggalSekarang->diffInDays($tanggal);

        return view('admin.dashboard', compact('peserta','cabor','event','selisihHari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
