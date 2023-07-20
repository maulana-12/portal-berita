<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
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
        $articles = Article::all();

        return view('back.article.index', [
            'articles' => $articles,
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
        $categories = Category::all();
        return view('back.article.create', [
            'categories' => $categories,
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
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $request->file('image')->store('article');
        $data['user_id'] = Auth::id();
        $data['views'] = 0;

        Article::create($data);

        return redirect()->route('article.index')->with(['success' => 'Data berhasil disimpan']);
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
            $article = Article::findOrFail($id);
            $categories = Category::all();

            return view('back.article.edit', [
                'article' => $article,
                'category' => $categories,
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
            $article = Article::find($id);
            $article->update([
                'title' => $request->title,
                'body' => $request->body,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                // 'views' => 0,
            ]);
            return redirect()->route('article.index')->with(['success' => 'Data berhasil diupdate']);
        } else {
            $article = Article::find($id);
            Storage::delete($article->image);
            $article->update([
                'title' => $request->title,
                'body' => $request->body,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                // 'views' => 0,
                'image' => $request->file('image')->store('article'),
            ]);
            return redirect()->route('article.index')->with(['success' => 'Data berhasil diupdate']);
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
            $article = Article::findOrFail($id);
            Storage::delete($article->image);
            $article->delete();
            return redirect()->route('article.index')->with(['success' => 'Data berhasil dihapus']);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
