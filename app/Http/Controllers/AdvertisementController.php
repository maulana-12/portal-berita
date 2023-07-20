<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
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
        $advertisements = Advertisement::all();

        return view('back.advertisement.index',  [
            'advertisements' => $advertisements,
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
        return view('back.advertisement.create', [
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
            $data['image'] = $request->file('image')->store('advertisement');
            Advertisement::create($data);
            return redirect()->route('advertisement.index')->with(['success' => 'Data berhasil disimpan']);
        } else {
            $data = $request->all();
            Advertisement::create($data);
            return redirect()->route('advertisement.index')->with(['success' => 'Data berhasil disimpan']);
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
            $advertisement = Advertisement::findOrFail($id);

            return view('back.advertisement.edit', [
                'advertisement' => $advertisement,
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
            $advertisement = Advertisement::find($id);
            $advertisement->update([
                'title' => $request->title,
                'status' => $request->status,
                'link' => $request->link,
            ]);
            return redirect()->route('advertisement.index')->with(['success' => 'Data berhasil diupdate']);
        } else {
            $advertisement = Advertisement::find($id);
            Storage::delete($advertisement->image);
            $advertisement->update([
                'title' => $request->title,
                'status' => $request->status,
                'link' => $request->link,
                'image' => $request->file('image')->store('advertisement'),
            ]);
            return redirect()->route('advertisement.index')->with(['success' => 'Data berhasil diupdate']);
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
            $advertisement = Advertisement::findOrFail($id);
            Storage::delete($advertisement->image);
            $advertisement->delete();
            return redirect()->route('advertisement.index')->with(['success' => 'Data berhasil dihapus']);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
