<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->image){
            $img = $request->file('image');
            $size = $img->getSize();
            $namaImage = time() . "_" . $img->getClientOriginalName();
            Storage::disk('public')->put('images/team/'.$namaImage, file_get_contents($img->getRealPath()));
        }
        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'order' => $request->order,
            'image' => $namaImage,
        ]);
        return redirect()->route('team.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('team.edit', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'image' => 'sometimes|file|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->image){
            $oldLogo = $team->image;
            if ($oldLogo) {
                // Menghapus file image yang lama dari penyimpanan
                Storage::disk('public')->delete('images/team/' . $oldLogo);
            }
            $img = $request->file('image');
            $size = $img->getSize();
            $namaImage = time() . "_" . $img->getClientOriginalName();
            Storage::disk('public')->put('images/team/'.$namaImage, file_get_contents($img->getRealPath()));
        }
        $team->update([
            'name' => $request->name,
            'position' => $request->position,
            'order' => $request->order,
            'image' => $namaImage ?? $team->image,
        ]);

        return redirect()->route('team.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('team.index')->with('success', 'Data berhasil dihapus');
    }
}
