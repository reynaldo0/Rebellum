@extends('layouts.admin')

@section('title', 'Artikel')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($articles as $article)
            <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $article->title }}
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ Str::limit($article->description, 100, '...') }}
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xs text-gray-400">Dibuat oleh: {{ $article->user->name }}</span>
                        <a href="{{ route('articles.detail.show', $article->id) }}"
                           class="text-blue-500 hover:text-blue-700 text-sm font-medium">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
