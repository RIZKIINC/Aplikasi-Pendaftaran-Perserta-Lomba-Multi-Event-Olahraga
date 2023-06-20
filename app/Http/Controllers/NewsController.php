<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Berita::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
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
            Storage::disk('public')->put('images/news/'.$namaImage, file_get_contents($img->getRealPath()));
        }
        Berita::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $namaImage,
        ]);
        return redirect()->route('news.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $news
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $news)
    {
        $this->validate($request, [
            'image' => 'sometimes|file|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->image){
            $oldLogo = $news->image;
            if ($oldLogo) {
                // Menghapus file image yang lama dari penyimpanan
                Storage::disk('public')->delete('images/news/' . $oldLogo);
            }
            $img = $request->file('image');
            $size = $img->getSize();
            $namaImage = time() . "_" . $img->getClientOriginalName();
            Storage::disk('public')->put('images/news/'.$namaImage, file_get_contents($img->getRealPath()));
        }
        $news->update([
            
            'title' => $request->title,
            'description' => $request->description,
            'image' => $namaImage ?? $news->image,
        ]);

        return redirect()->route('news.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Data berhasil dihapus');
    }
}
