<?php

namespace App\Http\Controllers;

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
            if ($request->input("quiz_{$quiz->id}") === $quiz->correct_answer) {
                $score++;
            }
        }

        Score::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'score' => $score
        ]);

        return redirect()->route('pages.quiz.index')->with('success', 'Quiz berhasil dikerjakan!');
    }

    public function indexAdmin()
    {
        $scores = Score::with('user')->get();
        return view('pages.quiz.score', compact('scores'));
    }
}
