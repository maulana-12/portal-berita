<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materis = Materi::all();
        return view('back.materi.index', [
            'materis' => $materis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlists = Playlist::all();
        return view('back.materi.create', compact('playlists'));
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
            'title' => 'required|min:4',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $request->file('image')->store('materi');

        Materi::create($data);

        return redirect()->route('materi.index')->with(['success' => 'Data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $materi = Materi::findOrFail($id);
            $playlists = Playlist::all();

            return view('back.materi.edit', [
                'materi' => $materi,
                'playlists' => $playlists,
            ]);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('image'))) {
            $materi = Materi::find($id);
            $materi->update([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
                'playlist_id' => $request->playlist_id,
                'is_active' => $request->is_active,
                'link' => $request->link,
            ]);
            return redirect()->route('materi.index')->with(['success' => 'Data berhasil diupdate']);
        } else {
            $materi = Materi::find($id);
            Storage::delete($materi->image);
            $materi->update([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
                'playlist_id' => $request->playlist_id,
                'is_active' => $request->is_active,
                'link' => $request->link,
                'image' => $request->file('image')->store('materi'),
            ]);
            return redirect()->route('materi.index')->with(['success' => 'Data berhasil diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $materi = Materi::findOrFail($id);
            Storage::delete($materi->image);
            $materi->delete();
            return redirect()->route('materi.index')->with(['success' => 'Data berhasil dihapus']);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
