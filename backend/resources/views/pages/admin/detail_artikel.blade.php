@extends('layouts.admin')

{{-- @section('title', 'Artikel') --}}

@section('content')
    <div class="flex justify-between items-center mb-5">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Artikel</h1>

        <form id="filter" method="GET" class="col-span-2">
            <select id="categories" name="category"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == request()->query('category') ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($articles as $article)
            <a href="{{ route('articles.detail.show', $article->id) }}"
                class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 hover:shadow-xl transition-all">
                <div class="p-4">
                    <div class="w-full h-[200px] overflow-hidden relative">
                        <img class="w-full h-full object-cover"
                            src="{{ $article->image ? asset('storage/' . $article->image) : 'https://placehold.co/200' }}"
                            alt="{{ $article->title }}">

                        <small
                            class="absolute top-2 right-2 px-2 py-1 text-xs bg-yellow-500 rounded shadow border border-yellow-600 text-white">
                            {{ $article->category->name }}
                        </small>
                    </div>

                    <div class="flex flex-col justify-between h-full">
                        <div class="min-h-[90px]">
                            <h3 class="text-lg mt-1 font-semibold text-gray-900 dark:text-white">
                                {{ $article->title }}
                            </h3>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ Str::limit(strip_tags($article->description), 100, '...') }}
                            </p>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex flex-col">
                                <span class="text-xs text-gray-400 mb-1 ">{{ $article->likes()->count() }} suka -
                                    {{ $article->comments()->count() }} komentar</span>
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
                </div>
            </a>
        @endforeach
    </div>

    <script>
        const filterForm = document.getElementById('filter');
        const categories = document.getElementById('categories');

        categories.onchange = () => {
          filterForm.submit();
        }
    </script>
@endsection
