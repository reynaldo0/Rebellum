<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function store(Request $request)
    {
        $quizzes = Quiz::all();
        $score = 0;

        foreach ($quizzes as $quiz) {
            if ($request->input("answers.{$quiz->id}") === $quiz->correct_answer) {
                $score++;
            }

            Score::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id, // Simpan quiz_id
                'score' => $score
            ]);
        }

        return redirect()->back()->with('score', $score);
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
