@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Quiz: {{ $category->name }}</h2>
            <a href="{{ route('user.quiz.index') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm">
                Kuis Lainnya
            </a>
        </div>

        {{-- Modal Box --}}
        @if (session()->has('score'))
            <div id="modal-score"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300">
                <div
                    class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full transform scale-90 transition-transform duration-300">

                    @if (session('score') == 0)
                        <h2 class="text-xl font-bold text-gray-800">🙁 Coba Lagi!</h2>
                        <p class="mt-4 text-gray-600">Skor Anda: <span class="text-red-600 font-semibold">0</span> dari
                            100</p>
                        <p class="text-sm text-gray-600">Sepertinya Anda belum berhasil. Ingin mencoba quiz lagi?</p>
                    @else
                        <h2 class="text-xl font-bold text-gray-800">🎉 Hasil Quiz</h2>
                        <p class="mt-4 text-gray-600">Skor Anda: <span
                                class="text-blue-600 font-semibold">{{ session('score') }}</span> dari 100
                        </p>
                    @endif

                    {{-- Tombol Tindakan --}}
                    <div class="mt-4 flex justify-between">
                        @if (session('score') == 0)
                            <a href="{{ route('user.quiz.show', $category->id) }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Coba Lagi
                            </a>
                        @endif
                        <a href="{{ route('user.quiz.index') }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Kuis Lainnya
                        </a>
                    </div>
                </div>
            </div>

            {{-- JavaScript to handle modal appearance --}}
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let modal = document.getElementById("modal-score");
                    let closeModal = document.getElementById("close-modal");

                    // Show the modal with fade-in and scale-up effect
                    setTimeout(() => {
                        modal.classList.remove("opacity-0", "pointer-events-none");
                        modal.firstElementChild.classList.remove("scale-90");
                    }, 500);

                    // Close modal on button click
                    closeModal.addEventListener("click", function() {
                        modal.classList.add("opacity-0", "pointer-events-none");
                        modal.firstElementChild.classList.add("scale-90");
                    });
                });
            </script>
        @endif

        {{-- Form Quiz --}}
        <form action="{{ route('scores.store') }}" method="POST" class="space-y-6" id="quiz-form">
            @csrf
            @foreach ($quizzes as $quiz)
                <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                    <p class="font-semibold text-lg text-gray-700">{{ $quiz->question }}</p>
                    <div class="mt-2 space-y-2">
                        @foreach (['A', 'B', 'C', 'D'] as $option)
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $option }}"" class="form-radio text-blue-500">
                                <span class="text-gray-600">{{ $quiz['option_' . strtolower($option)] }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Submit
            </button>
        </form>
    </div>

    {{-- JavaScript to validate form --}}
    <script>
        document.getElementById('quiz-form').addEventListener('submit', function(event) {
            let formValid = true;
            // Loop through each question to check if it is answered
            document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
                let questionId = radio.name.match(/\d+/)[0]; // Extract the quiz ID from the name
                let answerSelected = document.querySelector(`input[name="answers[${questionId}]"]:checked`);
                if (!answerSelected) {
                    formValid = false;
                    // Optionally, highlight the unanswered question
                    document.querySelector(`#quiz-question-${questionId}`).classList.add('border-red-500');
                } else {
                    document.querySelector(`#quiz-question-${questionId}`).classList.remove('border-red-500');
                }
            });

            if (!formValid) {
                // If a question is not answered, prevent form submission and show alert
                event.preventDefault();
                alert("Semua pertanyaan harus dijawab sebelum mengirimkan kuis.");
            }
        });
    </script>
@endsection
