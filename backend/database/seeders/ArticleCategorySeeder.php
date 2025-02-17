<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Bullying', 'Merokok', 'Mabuk', 'Narkoba', 'Pelecehan Seksual', 'Tawuran'];

        foreach ($data as $value) {
            ArticleCategory::create([
                'name' => $value,
            ]);
        }
    }
}
