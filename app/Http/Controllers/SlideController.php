<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    protected $sidebarItems;

    public function __construct()
    {
        // Menggunakan SidebarController untuk mendapatkan data sidebar
        $sidebarController = new SidebarItemsController();
        $this->sidebarItems = $sidebarController->getSidebarItems();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();

        return view('back.slide.index', [
            'slides' => $slides,
            'sidebarItems' => $this->sidebarItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.slide.create', [
            'sidebarItems' => $this->sidebarItems
        ]);
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
            'image' => 'mimes:png,jpg,jpeg,gif'
        ]);

        if (!empty($request->file('image'))) {
            $data = $request->all();
            $data['image'] = $request->file('image')->store('slide');
            Slide::create($data);
            return redirect()->route('slide.index')->with(['success' => 'Data berhasil disimpan']);
        } else {
            $data = $request->all();
            Slide::create($data);
            return redirect()->route('slide.index')->with(['success' => 'Data berhasil disimpan']);
        }
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
            $slide = Slide::findOrFail($id);

            return view('back.slide.edit', [
                'slide' => $slide,
                'sidebarItems' => $this->sidebarItems
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
            $slide = Slide::find($id);
            $slide->update([
                'title' => $request->title,
                'status' => $request->status,
                'link' => $request->link,
            ]);
            return redirect()->route('slide.index')->with(['success' => 'Data berhasil diupdate']);
        } else {
            $slide = Slide::find($id);
            Storage::delete($slide->image);
            $slide->update([
                'title' => $request->title,
                'status' => $request->status,
                'link' => $request->link,
                'image' => $request->file('image')->store('slide'),
            ]);
            return redirect()->route('slide.index')->with(['success' => 'Data berhasil diupdate']);
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
            $slide = Slide::findOrFail($id);
            Storage::delete($slide->image);
            $slide->delete();
            return redirect()->route('slide.index')->with(['success' => 'Data berhasil dihapus']);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
