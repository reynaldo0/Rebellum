<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    // ScoreController.php
    public function store(Request $request)
    {
        $quizzes = Quiz::all();
        $totalScore = 0;

        // Hitung skor berdasarkan jawaban yang benar
        foreach ($quizzes as $quiz) {
            // Ambil jawaban user untuk masing-masing quiz
            $userAnswer = $request->input("answers.{$quiz->id}");

            // Cek jika jawaban benar
            if ($userAnswer === $quiz->correct_answer) {
                $totalScore += $quiz->score; // Tambah score jika jawaban benar
            }

            // Menyimpan skor per quiz ke dalam Score table jika jawabannya benar
            Score::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
                'score' => ($userAnswer === $quiz->correct_answer) ? $quiz->score : 0, // Simpan skor hanya jika benar
            ]);
        }

        // Jika total skor lebih dari atau sama dengan 100, setel skor maksimal menjadi 100
        if ($totalScore >= 100) {
            $totalScore = 100;
        }

        // Menyimpan total skor pada user dan quiz
        Score::create([
            'user_id' => Auth::id(),
            'quiz_id' => null, // Tidak ada quiz_id untuk total score
            'score' => $totalScore
        ]);

        // Mengarahkan ke halaman hasil dengan skor
        return redirect()->back()->with('score', $totalScore);
    }

    public function indexAdmin(Request $request)
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::with('quizzes')->get();

        // Ambil kategori yang dipilih dari query string (jika ada)
        $selectedCategory = $request->query('category_id');

        // Ambil skor berdasarkan kategori yang dipilih (jika ada)
        $scores = Score::with(['user', 'quiz.category'])
            ->when($selectedCategory, function ($query) use ($selectedCategory) {
                return $query->whereHas('quiz', function ($query) use ($selectedCategory) {
                    $query->where('category_id', $selectedCategory);
                });
            })
            ->orderBy('score', 'desc') // Urutkan berdasarkan score tertinggi
            ->get();

        return view('pages.admin.quiz.score', compact('scores', 'categories', 'selectedCategory'));
    }
}
