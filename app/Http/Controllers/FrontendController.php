<?php

namespace App\Http\Controllers;

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

        return view('front.detail-article', [
            'article' => $article,
            'category' => $this->category
        ]);
    }
}
