<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = DB::table('peserta')->get();

        return view('admin.peserta.peserta', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peserta = DB::table('peserta')->get();
        $event_cabor = DB::table('event_cabor')->pluck('nama_event');
        $kecamatan = DB::table('kecamatan')->pluck('namakecamatan');
        return view('admin.peserta.create', compact('peserta', 'event_cabor', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_event_cabor' => 'required',
            'nama_kecamatan' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'nomor_kk' => 'required',
            'akta' => 'required|image',
            'foto' => 'required|image',
            'alamat' => 'required',
            'no_olahraga' => 'required',
            'domisili' => 'required',
            'no_ijazah' => 'required',
            'jk' => 'required',
        ]);

        // Process the uploaded files (akta and foto)
        if ($request->hasFile('akta') && $request->hasFile('foto')) {
            $aktaFile = $request->file('akta');
            $fotoFile = $request->file('foto');

            $aktaName = date('YmdHis') . "." . $aktaFile->getClientOriginalExtension();
            $fotoName = date('YmdHis') . "." . $fotoFile->getClientOriginalExtension();

            $aktaFile->move(public_path('uploads'), $aktaName);
            $fotoFile->move(public_path('uploads'), $fotoName);

            $kecamatan = Kecamatan::where('namakecamatan', $request->input('nama_kecamatan'))->first();
            $kecamatan_id = $kecamatan ? $kecamatan->id : null;


            // Save the data to the database
            $peserta = new Peserta();
            $peserta->nama_event_cabor = $request->input('nama_event_cabor');
            $peserta->kecamatan_id = $kecamatan_id;
            $peserta->nama = $request->input('nama');
            $peserta->nik = $request->input('nik');
            $peserta->ttl = $request->input('ttl');
            $peserta->nomor_kk = $request->input('nomor_kk');
            $peserta->akta = $aktaName; // Store the path relative to the 'public' disk
            $peserta->foto = $fotoName; // Store the path relative to the 'public' disk
            $peserta->alamat = $request->input('alamat');
            $peserta->no_olahraga = $request->input('no_olahraga');
            $peserta->domisili = $request->input('domisili');
            $peserta->no_ijazah = $request->input('no_ijazah');
            $peserta->jk = $request->input('jk');
            $peserta->save();

            // Redirect to the desired page
            return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan');
        }

        // Redirect back if the required files are not uploaded
        return back()->with('error', 'File akta dan foto harus diunggah');
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
        $peserta = Peserta::find($id);

        if (!$peserta) {
            // Handle case when peserta is not found
            return redirect()->back()->with('error', 'Peserta not found.');
        }

        $event_cabor = DB::table('event_cabor')->pluck('nama_event');
        $kecamatan = DB::table('kecamatan')->pluck('namakecamatan');

        return view('admin.peserta.edit', compact('peserta', 'event_cabor', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'nama_event_cabor' => 'required',
            'nama_kecamatan' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'nomor_kk' => 'required',
            'alamat' => 'required',
            'no_olahraga' => 'required',
            'domisili' => 'required',
            'no_ijazah' => 'required',
            'jk' => 'required',
            'akta' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            // Add validation rules for other fields as needed
        ]);

        // Find the record to be updated
        $peserta = Peserta::findOrFail($id);

        $kecamatan = Kecamatan::where('namakecamatan', $request->input('nama_kecamatan'))->first();
        $kecamatan_id = $kecamatan ? $kecamatan->id : null;


        // Update the record with the new values
        $peserta->nama_event_cabor = $request->input('nama_event_cabor');
        $peserta->kecamatan_id = $kecamatan_id;
        $peserta->nama = $request->input('nama');
        $peserta->nik = $request->input('nik');
        $peserta->ttl = $request->input('ttl');
        $peserta->nomor_kk = $request->input('nomor_kk');
        $peserta->alamat = $request->input('alamat');
        $peserta->no_olahraga = $request->input('no_olahraga');
        $peserta->domisili = $request->input('domisili');
        $peserta->no_ijazah = $request->input('no_ijazah');
        $peserta->jk = $request->input('jk');
        // Update other fields as needed

        // Handle file uploads for 'akta' field
        if ($request->hasFile('akta')) {
            $akta = $request->file('akta');
            $aktaName = time() . '_' . $akta->getClientOriginalName();
            $akta->move(public_path('uploads'), $aktaName);
            $peserta->akta = $aktaName;
        }

        // Handle file uploads for 'foto' field
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads'), $fotoName);
            $peserta->foto = $fotoName;
        }

        // Save the updated record
        if ($peserta->save()) {
            return redirect()->route('peserta.index')->with('success', 'Data peserta has been updated successfully.');
        } else {
            return redirect()->route('peserta.index')->with('error', 'Failed to update data peserta.');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peserta = Peserta::find($id);

        if (!$peserta) {
            // Handle case when peserta is not found
            return redirect()->back()->with('error', 'Peserta not found.');
        }

        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Peserta deleted successfully.');
    }

    public function generatePDF()
    {
        // Retrieve data for your table
        $data =  Peserta::all();
        $kecamatan = Kecamatan::all();


        $pdf = app()->make('dompdf.wrapper');

        $pdf->loadView('admin.peserta.table', ['data' => $data, 'kecamatan' => $kecamatan])->setPaper('a4', 'landscape');

        return $pdf->download('table.pdf');
    }

    public function export_excel()
    {
        return Excel::download(new DataExport, 'peserta.xlsx');
    }

    public function cetakpdf()
    {
        $data = Peserta::all();
        $kecamatan = Kecamatan::all();

        // Generate the PDF using the same logic as in generatePDF()
        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('admin.peserta.table', ['data' => $data, 'kecamatan' => $kecamatan])->setPaper('a4', 'landscape');

        // Return the PDF view for display in the browser
        return $pdf->stream('table.pdf');
    }
}
