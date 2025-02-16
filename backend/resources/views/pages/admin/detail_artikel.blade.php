@extends('layouts.admin')

@section('title', 'Artikel')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($articles as $article)
            <a href="{{ route('articles.detail.show', $article->id) }}"
                class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 hover:shadow-xl transition-all">
                <div class="p-4">
                    <div class="w-full h-[200px] bg-red-400 overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="{{ $article->image ? asset('storage/' . $article->image) : 'https://placehold.co/200' }}"
                            alt="{{ $article->title }}">
                    </div>

                    <h3 class="text-lg mt-1 font-semibold text-gray-900 dark:text-white">
                        {{ $article->title }}
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ Str::limit($article->description, 100, '...') }}
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-400 mb-1 ">{{ $article->likes()->count() }} suka - {{ $article->comments()->count() }} komentar</span>
                            <span class="text-xs text-gray-400">Dibuat oleh: {{ $article->user->name }}</span>
                        </div>
                        <form action="{{ route('articles.like', $article->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-500 text-4xl">
                                @if ($article->hasLikedByUser())
                                    <i class='bx bxs-heart'></i>
                                @else
                                    <i class='bx bx-heart'></i>
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
