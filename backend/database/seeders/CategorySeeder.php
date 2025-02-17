<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Kesadaran Sosial', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Kesehatan Mental', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Kepribadian dan Minat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pemecahan Masalah', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hubungan Sehat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Digital Awareness', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
