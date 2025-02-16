@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Leaderboard Quiz</h2>

        <!-- Filter Kategori -->
        <form action="{{ route('admin.quiz.score') }}" method="GET" class="mb-4">
            <label for="category" class="block text-gray-600">Filter Berdasarkan Kategori:</label>
            <select name="category_id" id="category"
                class="w-full md:w-1/3 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                <option value="">-- Semua Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Filter
            </button>
        </form>

        <!-- Tabel Leaderboard -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-gray-100 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2 text-left">Nama User</th>
                        <th class="px-4 py-2 text-left">Score</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($scores as $score)
                        <tr class="border-b hover:bg-blue-100 transition">
                            <td class="px-4 py-2 text-gray-700">{{ $score->user->name }}</td>
                            <td class="px-4 py-2 text-gray-700 font-semibold">{{ $score->score }}</td>
                            <td class="px-4 py-2 text-gray-700">{{ optional($score->quiz->category)->name ?? 'Tidak Ada Kategori' }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-gray-600 text-center">
                                Tidak ada skor yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
