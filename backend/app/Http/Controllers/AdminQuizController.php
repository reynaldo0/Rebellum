<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Hitung total skor dari kategori ini
        $totalScore = $category->quizzes()->sum('score');

        if ($totalScore < 100) {
            return redirect()->back()->with('error', 'Kategori ini belum memiliki total nilai 100, tambahkan lebih banyak soal.');
        }

        return view('pages.admin.quiz.show', compact('category'));
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

    public function startQuiz($category_id)
    {
        $category = Category::findOrFail($category_id);

        if ($category->totalScore() < 100) {
            return redirect()->back()->with('error', 'Kategori ini belum bisa dikerjakan, nilai totalnya kurang dari 100.');
        }

        $quizzes = Quiz::where('category_id', $category_id)->get();
        return view('quiz.start', compact('quizzes', 'category'));
    }

    public function leaderboard(Request $request)
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Cek apakah ada kategori yang dipilih, jika tidak, ambil kategori pertama
        $categoryId = $request->query('category_id', $categories->first()->id ?? null);

        // Pastikan ada kategori yang valid
        if (!$categoryId || !$categories->find($categoryId)) {
            return redirect()->route('admin.quiz.leaderboard')
                ->with('error', 'Kategori tidak ditemukan.');
        }

        // Ambil daftar skor hanya jika kategori dipilih
        $scores = collect();

        if ($categoryId) {
            // Total skor maksimum dari kategori (berdasarkan soal yang dibuat admin)
            $totalScore = Quiz::where('category_id', $categoryId)->sum('score');

            // Jika total skor adalah 0, beri pesan
            if ($totalScore == 0) {
                return redirect()->route('admin.quiz.leaderboard')
                    ->with('error', 'Tidak ada soal di kategori ini.');
            }

            // Ambil leaderboard berdasarkan kategori dengan skor yang sudah ditentukan admin
            $scores = Score::with(['user', 'quiz'])
                ->whereHas('quiz', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                })
                ->selectRaw('user_id, SUM(score) as user_score, COUNT(DISTINCT quiz_id) as attempts')  // COUNT DISTINCT to avoid overcounting
                ->groupBy('user_id')
                ->orderByDesc('user_score')
                ->get()
                ->map(function ($score) use ($totalScore) {
                    // Batasi skor maksimal 100
                    $score->user_score = min($score->user_score, 100);

                    // Update max_score dan persentase
                    $score->max_score = $totalScore;
                    $score->percentage = $totalScore > 0 ? round(($score->user_score / $totalScore) * 100, 2) : 0;

                    // Cek apakah pengguna sudah mendapatkan skor 100 atau lebih, jika ya, jangan izinkan percobaan lagi
                    if ($score->user_score >= 100) {
                        $score->attempts = 1; // Batasi percobaan ke 1 jika sudah mencapai skor 100
                    }

                    // Ambil percobaan user berdasarkan skor
                    $score->attempts = Score::where('user_id', $score->user_id)->count();

                    // Batasi percobaan ke maksimal 3
                    if ($score->attempts > 3) {
                        $score->attempts = 3;
                    }

                    return $score;
                });
        }

        // Jika tidak ada skor, beri pesan
        if ($scores->isEmpty()) {
            return redirect()->route('admin.quiz.leaderboard')
                ->with('message', 'Tidak ada data untuk kategori ini.');
        }

        // Kirim data ke view
        return view('pages.admin.quiz.leaderboard', compact('categories', 'scores', 'categoryId'));
    }
}
