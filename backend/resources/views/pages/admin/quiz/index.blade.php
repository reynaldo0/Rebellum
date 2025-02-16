@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manajemen Quiz</h2>
        <a href="{{ route('admin.quiz.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">Tambah Quiz</a>

        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="py-2 px-4 border">Pertanyaan</th>
                        <th class="py-2 px-4 border">Pilihan</th>
                        <th class="py-2 px-4 border">Jawaban Benar</th>
                        <th class="py-2 px-4 border">Nilai</th> <!-- Tambahkan Kolom Nilai -->
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-2 px-4 border">{{ $quiz->question }}</td>
                            <td class="py-2 px-4 border">{{ $quiz->option_a }}, {{ $quiz->option_b }},
                                {{ $quiz->option_c }}, {{ $quiz->option_d }}</td>
                            <td class="py-2 px-4 border font-bold text-green-600">{{ $quiz->correct_answer }}</td>
                            <td class="py-2 px-4 border font-bold text-blue-600">{{ $quiz->score }}</td> <!-- Menampilkan Nilai -->
                            <td class="py-2 px-4 border flex space-x-2">
                                <a href="{{ route('admin.quiz.edit', $quiz->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-lg text-sm">Edit</a>

                                <form action="{{ route('admin.quiz.destroy', $quiz->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-lg text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
