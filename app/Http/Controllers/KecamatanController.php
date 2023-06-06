<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = DB::table('kecamatan')->get();

        return view('admin.kecamatan.kecamatan', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kecamatan = DB::table('kecamatan')->get();

        return view('admin.kecamatan.create', compact('kecamatan', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
              // Validate the incoming request data
              $validatedData = $request->validate([
                'namacamat' => 'required',
                'notelp' => 'required',
                'email' => 'required',
                'kodepos' => 'required',
                'alamat' => 'required',
                'namakecamatan' => 'required',

            ]);


    {
  
            // Save the data to the database
            $kecamatan = new Kecamatan();
            $kecamatan->namacamat = $request->input('namacamat');
            $kecamatan->notelp = $request->input('notelp');
            $kecamatan->email = $request->input('email');
            $kecamatan->kodepos = $request->input('kodepos');
            $kecamatan->alamat = $request->input('alamat');
            $kecamatan->namakecamatan = $request->input('namakecamatan');
            $kecamatan->save();

            // Redirect to the desired page
            return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan berhasil ditambahkan');
        

            // Redirect back if the required files are not uploaded
            return back()->with('error', 'File akta dan foto harus diunggah');
    }
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
        $kecamatan = Kecamatan::find($id);

        if (!$kecamatan) {
            // Handle case when kecamatan is not found
            return redirect()->back()->with('error', 'Kecamatan not found.');
        }


        return view('admin.kecamatan.edit', compact('kecamatan', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form input
        $validatedData = $request->validate([
                'namacamat' => 'required',
                'notelp' => 'required',
                'email' => 'required',
                'kodepos' => 'required',
                'alamat' => 'required',
                'namakecamatan' => 'required',
            // Add validation rules for other fields as needed
        ]);

        // Find the record to be updated
        $kecamatan = Kecamatan::findOrFail($id);

        //salah
        // $kecamatan = Kecamatan::where('namakecamatan', $request->input('nama_kecamatan'))->first();
        // $kecamatan_id = $kecamatan ? $kecamatan->id : null;


       // Update the record with the new values
       $kecamatan->namacamat = $request->input('namacamat');
       $kecamatan->notelp = $request->input('notelp');
       $kecamatan->email = $request->input('email');
       $kecamatan->kodepos = $request->input('kodepos');
       $kecamatan->alamat = $request->input('alamat');
       $kecamatan->namakecamatan = $request->input('namakecamatan');


       // Update other fields as needed
      

      // Save the updated record
        if ($kecamatan->save()) {
            return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan has been updated successfully.');
        } else {
            return redirect()->route('kecamatan.index')->with('error', 'Failed to update data kecamatan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kecamatan = Kecamatan::find($id);

        if (!$kecamatan) {
            // Handle case when kecamatan is not found
            return redirect()->back()->with('error', 'Kecamatan not found.');
        }

        $kecamatan->delete();

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan deleted successfully.');
    }
}
