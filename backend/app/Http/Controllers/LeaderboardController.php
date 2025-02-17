<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Score;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index(Request $request)
{
    // Ambil semua kategori
    $categories = Category::all();

    // Cek apakah ada kategori yang dipilih, jika tidak, ambil kategori pertama
    $categoryId = $request->query('category_id', $categories->first()->id ?? null);

    // Cek apakah kategori valid
    if ($categoryId && !$categories->find($categoryId)) {
        // Jika kategori tidak ditemukan, beri pesan dan hentikan eksekusi lebih lanjut
        return view('pages.admin.quiz.leaderboard', [
            'categories' => $categories,
            'categoryId' => $categoryId,
            'error' => 'Kategori tidak ditemukan.',
            'scores' => collect() // Ensure $scores is initialized
        ]);
    }

    // Ambil daftar skor hanya jika kategori dipilih
    $scores = collect();

    if ($categoryId) {
        // Total skor maksimum dari kategori (berdasarkan soal yang dibuat admin)
        $totalScore = Quiz::where('category_id', $categoryId)->sum('score');

        // Jika total skor adalah 0, beri pesan tanpa redirect
        if ($totalScore == 0) {
            return view('pages.admin.quiz.leaderboard', [
                'categories' => $categories,
                'categoryId' => $categoryId,
                'error' => 'Tidak ada soal di kategori ini.',
                'scores' => collect() // Ensure $scores is initialized
            ]);
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

    // Kirim data ke view, termasuk $scores meskipun kosong
    return view('pages.admin.quiz.leaderboard', [
        'categories' => $categories,
        'categoryId' => $categoryId,
        'scores' => $scores, // Ensure $scores is passed
        'error' => $scores->isEmpty() ? 'Tidak ada data untuk kategori ini.' : null, // Show error message if no scores
        'message' => null // Optional message
    ]);
}

}
