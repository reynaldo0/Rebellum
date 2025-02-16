<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class AdminQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::with('category')->get();
        $categories = Category::all();

        return view('pages.admin.quiz.index', compact('quizzes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.quiz.create', compact('categories'));
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
            'correct_answer' => 'required|in:A,B,C,D',
            'score' => 'required|integer|min:1|max:100'
        ]);

        Quiz::create($request->all());

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz berhasil ditambahkan!');
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
            'correct_answer' => 'required|in:A,B,C,D',
            'score' => 'required|integer|min:1|max:100'
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz berhasil diperbarui!');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $totalScore = Quiz::where('category_id', $category->id)->sum('score');

        if ($totalScore < 100) {
            return redirect()->back()->with('error', 'Kategori ini belum memiliki total nilai 100, tambahkan lebih banyak soal.');
        }

        return view('quiz.show', compact('category'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return redirect()->route('admin.quiz.index')->with('success', 'Quiz berhasil dihapus!');
    }

    public function startQuiz($category_id)
    {
        $category = Category::findOrFail($category_id);

        if ($category->totalScore() < 100) {
            return redirect()->back()->with('error', 'Kategori ini belum bisa dikerjakan, nilai totalnya kurang dari 100.');
        }

        $quizzes = Quiz::where('category_id', $category_id)->get();
        return view('quiz.start', compact('quizzes', 'category'));
    }
}
