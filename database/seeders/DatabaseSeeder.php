<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'title' => 'Judul Artikel 1',
                'slug' => Str::slug('Judul Artikel 1'),
                'body' => 'Keterangan Artikel 1',
                'category_id' => 1,
                'user_id' => 1,
                'image' => '',
                'is_active' => true,
                'views' => 0
            ],
            [
                'title' => 'Judul Artikel 2',
                'slug' => Str::slug('Judul Artikel 2'),
                'body' => 'Keterangan Artikel 2',
                'category_id' => 2,
                'user_id' => 1,
                'image' => '',
                'is_active' => false,
                'views' => 0
            ],
            // Tambahkan data lainnya di sini
        ];

        foreach ($datas as $data) {
            Article::create($data);
        }
    }
}
