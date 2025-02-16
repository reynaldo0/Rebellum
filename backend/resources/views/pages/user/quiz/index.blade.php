@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Pilih Kategori Quiz</h2>

        @if ($categories->isEmpty())
            <p class="text-red-600 font-bold">Belum ada kategori quiz yang tersedia.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($categories as $category)
                    <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                        <h3 class="text-lg font-bold text-gray-700">{{ $category->name }}</h3>
                        <a href="{{ route('user.quiz.show', $category->id) }}"
                            class="mt-2 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                            Mulai Quiz
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
