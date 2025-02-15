<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class AdminQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('pages.admin.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        return view('pages.admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:A,B,C,D'
        ]);

        Quiz::create($request->all());

        return redirect()->route('pages.admin.quiz.index')->with('success', 'Quiz berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('pages.admin.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:A,B,C,D'
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());

        return redirect()->route('pages.admin.quiz.index')->with('success', 'Quiz berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return redirect()->route('pages.admin.quiz.index')->with('success', 'Quiz berhasil dihapus!');
    }
}
