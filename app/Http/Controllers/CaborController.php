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
 muy
        $cabor = DB::table('cabang_olahraga')->get();

        return view ('admin.cabor.create', compact('cabor'));

        //
 main
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 muy
        DB::table('cabang_olahraga')->insert([
            'cabor' => $request->cabor,
            'catatan' => $request->catatan,
        ]);
        return redirect('cabor');

        main
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
 muy
        $cabor = DB::table('cabang_olahraga')->where('id',$id)->get();
        return view('admin.cabor.edit', compact('cabor'));

        //
 main
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
 muy
        DB::table('cabang_olahraga')->where('id', $request->id)->update([
            'cabor' => $request->cabor,
            'catatan' => $request->catatan,
        ]);
        return redirect('cabor');

        //
  main
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
 muy
        DB::table('cabang_olahraga')->where('id', $id)->delete();
        return redirect('cabor');

        //
main
    }
}
