@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tambah Quiz</h2>
        <form action="{{ route('admin.quiz.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold">Pertanyaan</label>
                <input type="text" name="question" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Pilihan A</label>
                <input type="text" name="option_a" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Pilihan B</label>
                <input type="text" name="option_b" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Pilihan C</label>
                <input type="text" name="option_c" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Pilihan D</label>
                <input type="text" name="option_d" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Jawaban Benar</label>
                <select name="correct_answer" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition">Simpan</button>
        </form>
    </div>
@endsection
