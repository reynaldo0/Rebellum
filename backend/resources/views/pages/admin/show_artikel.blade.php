@extends('layouts.admin')

@section('title', 'Detail Artikel')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $article->title }}</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-2">{{ $article->description }}</p>
        <p class="text-sm text-gray-400 mt-4">Dibuat oleh: {{ $article->user->name }} | {{ $article->created_at->format('d M Y') }}</p>

        <a href="{{ route('articles.detail.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kembali
        </a>
    </div>
@endsection
