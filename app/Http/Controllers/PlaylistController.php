<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlist::all();

        // Menggunakan SidebarController untuk mendapatkan data sidebar
        $sidebarController = new SidebarItemsController();
        $sidebarItems = $sidebarController->getSidebarItems();

        return view('back.playlist.index', [
            'playlists' => $playlists,
            'sidebarItems' => $sidebarItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.playlist.create');
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
        $data['image'] = $request->file('image')->store('playlist');
        $data['user_id'] = Auth::id();

        Playlist::create($data);

        return redirect()->route('playlist.index')->with(['success' => 'Data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $playlist = Playlist::findOrFail($id);

            return view('back.playlist.edit', [
                'playlist' => $playlist,
            ]);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('image'))) {
            $playlist = Playlist::find($id);
            $playlist->update([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('playlist.index')->with(['success' => 'Data berhasil diupdate']);
        } else {
            $playlist = Playlist::find($id);
            Storage::delete($playlist->image);
            $playlist->update([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'image' => $request->file('image')->store('playlist'),
            ]);
            return redirect()->route('playlist.index')->with(['success' => 'Data berhasil diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $playlist = Playlist::findOrFail($id);
            Storage::delete($playlist->image);
            $playlist->delete();
            return redirect()->route('playlist.index')->with(['success' => 'Data berhasil dihapus']);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
