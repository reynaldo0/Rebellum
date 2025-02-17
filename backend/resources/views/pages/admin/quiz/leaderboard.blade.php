@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold mb-6 text-gray-700">📊 Leaderboard Quiz</h2>

        <!-- Pilihan Kategori -->
        <form method="GET" action="{{ route('admin.quiz.leaderboard') }}" class="mb-4">
            <label for="category_id" class="block text-gray-700 font-semibold mb-2">Pilih Kategori:</label>
            <select name="category_id" id="category_id" onchange="this.form.submit()" class="px-4 py-2 border rounded-md">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $categoryId ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>

        <div class="overflow-hidden border border-gray-200 rounded-lg">
            <table class="w-full border-collapse bg-white text-left">
                <thead class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-4 text-lg">🏅 Peringkat</th>
                        <th class="px-6 py-4 text-lg">👤 Nama User</th>
                        <th class="px-6 py-4 text-lg">🏆 Total Skor</th>
                        <th class="px-6 py-4 text-lg">📊 Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($scores as $index => $score)
                        <tr class="border-b hover:bg-gray-100 transition duration-300">
                            <td class="px-6 py-4 text-center font-bold text-gray-800">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-800 flex items-center gap-2">
                                <div
                                    class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full font-bold text-lg">
                                    {{ strtoupper(substr($score->user->name, 0, 1)) }}
                                </div>
                                {{ $score->user->name }}
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                <span class="px-4 py-2 bg-green-100 text-green-800 rounded-lg text-sm font-medium">
                                    {{ $score->user_score }} / {{ $score->max_score }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                {{ number_format(($score->user_score / $score->max_score) * 100, 2) }}%
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data untuk kategori ini.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
