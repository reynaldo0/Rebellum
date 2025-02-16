@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tambah Kategori</h2>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama Kategori</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg p-2">
            </div>

            <div class="mb-4">
                <label for="max_score" class="block text-gray-700">Nilai Maksimal</label>
                <input type="number" name="max_score" id="max_score" class="w-full border-gray-300 rounded-lg p-2" value="100">
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
                Simpan
            </button>
        </form>
    </div>
@endsection
