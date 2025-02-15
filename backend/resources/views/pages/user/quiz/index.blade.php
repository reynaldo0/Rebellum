@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Quiz</h2>

    <!-- Cek jika ada skor dalam session -->
    @if(session('score') !== null)
        <div id="scoreModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-xl font-bold text-gray-800">Hasil Quiz</h3>
                <p class="text-gray-600 mt-2">Skor Anda: <span class="font-semibold text-blue-600">{{ session('score') }}</span></p>
                <button onclick="closeModal()" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    OK
                </button>
            </div>
        </div>
    @endif

    <form action="{{ route('scores.store') }}" method="POST" class="space-y-6">
        @csrf
        @foreach($quizzes as $quiz)
            <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                <p class="font-semibold text-lg text-gray-700">{{ $quiz->question }}</p>
                <div class="mt-2 space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="quiz_{{ $quiz->id }}" value="A" class="form-radio text-blue-500">
                        <span class="text-gray-600">{{ $quiz->option_a }}</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="quiz_{{ $quiz->id }}" value="B" class="form-radio text-blue-500">
                        <span class="text-gray-600">{{ $quiz->option_b }}</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="quiz_{{ $quiz->id }}" value="C" class="form-radio text-blue-500">
                        <span class="text-gray-600">{{ $quiz->option_c }}</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="quiz_{{ $quiz->id }}" value="D" class="form-radio text-blue-500">
                        <span class="text-gray-600">{{ $quiz->option_d }}</span>
                    </label>
                </div>
            </div>
        @endforeach
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Submit</button>
    </form>
</div>

<script>
    function closeModal() {
        document.getElementById('scoreModal').style.display = 'none';
    }

    // Cek apakah modal harus ditampilkan setelah submit
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('scoreModal')) {
            setTimeout(() => {
                document.getElementById('scoreModal').style.display = 'flex';
            }, 500);
        }
    });
</script>
@endsection
