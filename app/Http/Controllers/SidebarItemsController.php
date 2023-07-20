<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SidebarItemsController extends Controller
{
    public function getSidebarItems()
    {
        return [
            [
                'url' => route('dashboard'),
                'icon' => 'fas fa-home',
                'title' => 'Dashboard',
                'route' => 'dashboard.index',
            ],
            [
                'url' => route('category.index'),
                'icon' => 'fas fa-tags',
                'title' => 'Kategori',
                'route' => 'category',
            ],
            [
                'url' => route('article.index'),
                'icon' => 'fas fa-newspaper',
                'title' => 'Artikel',
                'route' => 'article',
            ],
            [
                'url' => route('playlist.index'),
                'icon' => 'fas fa-video',
                'title' => 'Playlist Video',
                'route' => 'playlist',
            ],
            [
                'url' => route('materi.index'),
                'icon' => 'fas fa-book',
                'title' => 'Materi',
                'route' => 'materi',
            ],
            [
                'url' =>  route('slide.index'),
                'icon' => 'fas fa-book',
                'title' => 'Slide',
                'route' => 'slide',
            ],
            [
                'url' =>  route('advertisement.index'),
                'icon' => 'fas fa-book',
                'title' => 'Iklan',
                'route' => 'advertisement',
            ],
        ];
    }
}
