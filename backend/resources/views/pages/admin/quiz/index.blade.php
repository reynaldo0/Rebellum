@extends('layouts.admin')

@section('content')
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manajemen Kategori Soal</h2>

        <a href="{{ route('admin.categories.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition">
            Tambah Kategori
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($categories as $category)
                <div class="bg-white shadow-md rounded-lg p-4 border border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $category->name }}</h3>
                    <p class="text-gray-600 text-sm mt-2">
                        Total Soal: {{ $category->quizzes->count() }}
                    </p>
                    <p class="text-gray-600 text-sm mt-1">
                        Total Skor:
                        <span class="{{ $category->totalScore() >= 100 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $category->totalScore() }} / 100
                        </span>
                    </p>

                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('admin.categories.show', $category->id) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg">
                            Lihat Detail
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-2 px-4 rounded-lg">
                                Hapus Kategori
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
