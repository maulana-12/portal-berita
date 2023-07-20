<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $articles = Article::all();

        return view('front.home', [
            'category' => $category,
            'articles' => $articles
        ]);
    }
}
