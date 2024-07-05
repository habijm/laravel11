<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create;

        Category::create ([
            'name' => 'Programer',
            'slug' => 'programer',
        ]);

        Category::create ([
            'name' => 'UI/UX Designer',
            'slug' => 'ui-ux-designer',
        ]);

        Category::create ([
            'name' => 'Android Developer',
            'slug' => 'android-developer',
        ]);

        Category::create ([
            'name' => 'Data Analyst',
            'slug' => 'data-analyst',
        ]);
    }
}