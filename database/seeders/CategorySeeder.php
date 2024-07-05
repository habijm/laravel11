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
            'color' => 'red',
        ]);

        Category::create ([
            'name' => 'UI/UX Designer',
            'slug' => 'ui-ux-designer',
            'color' => 'green',
        ]);

        Category::create ([
            'name' => 'Android Developer',
            'slug' => 'android-developer',
            'color' => 'blue',
        ]);

        Category::create ([
            'name' => 'Data Analyst',
            'slug' => 'data-analyst',
            'color' => 'yellow',
        ]);
    }
}