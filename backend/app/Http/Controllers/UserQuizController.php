<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    // Menampilkan daftar kategori quiz untuk user
    public function index()
    {
        // Ambil kategori yang memiliki total skor minimal 100
        $categories = Category::whereIn('id', function ($query) {
            $query->select('category_id')
                ->from('quizzes')
                ->groupBy('category_id')
                ->havingRaw('SUM(score) >= 100');
        })->get();

        return view('pages.user.quiz.index', compact('categories'));
    }

    // Menampilkan quiz berdasarkan kategori yang dipilih user
    public function show($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $quizzes = Quiz::where('category_id', $categoryId)->get();

        return view('pages.user.quiz.show', compact('category', 'quizzes'));
    }

    // Proses menyimpan jawaban user
    public function submit(Request $request)
    {
        // Debugging: Cek apakah data dikirim dengan benar
        if (!$request->has('answers')) {
            return response()->json(['error' => 'No answers submitted'], 400);
        }

        $answers = $request->input('answers');
        $score = 0;

        foreach ($answers as $quizId => $userAnswer) {
            $quiz = Quiz::find($quizId);
            if ($quiz && $quiz->correct_answer === $userAnswer) {
                $score += 10; // Misal 10 poin per jawaban benar
            }
        }

        // Simpan skor dalam session
        session(['score' => $score]);

        // Redirect ke halaman hasil quiz
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $totalScore = 0;

        // Loop through the quizzes and calculate the score
        foreach ($request->answers as $quizId => $answer) {
            $quiz = Quiz::find($quizId);

            // Check if the answer matches the correct answer and add the quiz score to the total score
            if ($quiz && $quiz->correct_answer === $answer) {
                $totalScore += $quiz->score; // Add the score set by the admin
            }
        }

        // Store the score in the session
        session()->flash('score', $totalScore);

        return redirect()->route('user.quiz.show', $quiz->category_id); // Redirect back to the quiz page
    }
}
