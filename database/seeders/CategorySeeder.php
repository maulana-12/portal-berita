<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Category 1',
                'slug' => Str::slug('Category 1'),
            ],
            [
                'name' => 'Category 2',
                'slug' => Str::slug('Category 2'),
            ],
            [
                'name' => 'Category 3',
                'slug' => Str::slug('Category 3'),
            ],
            // Tambahkan data kategori lainnya di sini
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
