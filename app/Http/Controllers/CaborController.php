<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabor;
use DB;

class CaborController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabor = DB::table('cabang_olahraga')->get();

        return view('admin.cabor.cabor', compact('cabor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cabor = DB::table('cabang_olahraga')->get();

        return view ('admin.cabor.create', compact('cabor'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('cabang_olahraga')->insert([
            'cabor' => $request->cabor,
            'catatan' => $request->catatan,
        ]);
        return redirect('cabor');

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
        $cabor = DB::table('cabang_olahraga')->where('id',$id)->get();
        return view('admin.cabor.edit', compact('cabor'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('cabang_olahraga')->where('id', $request->id)->update([
            'cabor' => $request->cabor,
            'catatan' => $request->catatan,
        ]);
        return redirect('cabor');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('cabang_olahraga')->where('id', $id)->delete();
        return redirect('cabor');

        //
    }
}
