@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Hasil Quiz</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-gray-100 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2 text-left">Nama User</th>
                        <th class="px-4 py-2 text-left">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scores as $score)
                        <tr class="border-b hover:bg-blue-100 transition">
                            <td class="px-4 py-2 text-gray-700">{{ $score->user->name }}</td>
                            <td class="px-4 py-2 text-gray-700 font-semibold">{{ $score->score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
