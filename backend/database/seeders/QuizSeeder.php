<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::insert([
            [
                'question' => 'Apa ibukota Indonesia?',
                'option_a' => 'Jakarta',
                'option_b' => 'Surabaya',
                'option_c' => 'Bandung',
                'option_d' => 'Medan',
                'correct_answer' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Siapa presiden pertama Indonesia?',
                'option_a' => 'Soeharto',
                'option_b' => 'Sukarno',
                'option_c' => 'Habibie',
                'option_d' => 'Jokowi',
                'correct_answer' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Berapa hasil dari 10 + 5?',
                'option_a' => '12',
                'option_b' => '13',
                'option_c' => '14',
                'option_d' => '15',
                'correct_answer' => 'D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
