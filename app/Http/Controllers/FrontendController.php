<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Article;
use App\Models\Category;
use App\Models\Slide;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = Category::all();
    }

    public function index()
    {
        $articles = Article::all();
        $slides = Slide::all();

        return view('front.home', [
            'category' => $this->category,
            'articles' => $articles,
            'slide' => $slides
        ]);
    }

    public function detail($slug)
    {
        $article = Article::where('slug', $slug)->first();

        $advertisementA = Advertisement::where('id', '1')->first();

        $latestPost = Article::orderBy('created_at', 'DESC')->limit('5')->get();

        return view('front.detail-article', [
            'article' => $article,
            'category' => $this->category,
            'advertisementA' => $advertisementA,
            'latestPost' => $latestPost
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $advertisementA = Advertisement::where('id', '1')->first();

        $latestPost = Article::orderBy('created_at', 'DESC')->limit('5')->get();

        // Ambil berita yang sesuai dengan kata kunci pencarian
        $articles = Article::where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('front.search', [
            'articles' => $articles,
            'query' => $query,
            'category' => $this->category,
            'advertisementA' => $advertisementA,
            'latestPost' => $latestPost
        ]);
    }
}
