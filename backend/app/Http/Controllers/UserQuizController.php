<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    // Menampilkan daftar quiz untuk user
    public function index()
    {
        $quizzes = Quiz::all();
        return view('pages.user.quiz.index', compact('quizzes'));
    }

    // Menampilkan detail quiz agar user bisa mengerjakan
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('pages.user.quiz.show', compact('quiz'));
    }

    // Proses menyimpan jawaban user
    public function submit(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required|in:A,B,C,D'
        ]);

        // Ambil quiz berdasarkan ID
        $quiz = Quiz::findOrFail($id);

        // Cek apakah jawaban benar
        $isCorrect = $quiz->correct_answer === $request->answer;

        return redirect()->route('user.quiz.index')->with(
            'status',
            $isCorrect ? 'Jawaban benar!' : 'Jawaban salah!'
        );
    }
}
