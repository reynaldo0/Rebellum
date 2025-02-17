@extends('layouts.admin')

@section('title', 'Detail Artikel')

@section('content')
    <div class="relative bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
        <form action="{{ route('articles.like', $article->id) }}" method="post" class="absolute top-5 right-5 flex flex-col items-center">
            @csrf
            <button type="submit" class="text-red-500 text-5xl">
                <i class="bx {{ $article->hasLikedByUser() ? 'bxs-heart' : 'bx-heart' }}"></i>
            </button>
            <p class="-mt-1 text-gray-900 text-sm">{{ $article->likes()->count() }} suka</p>
        </form>

        <img class="max-w-full h-auto max-h-[300px] mb-4"
            src="{{ $article->image ? asset('storage/' . $article->image) : 'https://placehold.co/200' }}"
            alt="thumnail article">

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $article->title }}</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-2">{!!  $article->description  !!}</p>

        <p class="text-sm text-gray-400 mt-4">Dibuat oleh: {{ $article->user->name }} |
            {{ $article->created_at->format('d M Y') }}
        </p>

        <div class="my-4">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold mb-4">Komentar</h2>
                <button data-modal-target="modal-create" data-modal-toggle="modal-create"
                    class="inline-block h-fit bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-2 rounded">
                    Tambah Komentar
                </button>
            </div>
            {{-- Display existing comments --}}
            <div class="space-y-4">
                @foreach($article->comments as $comment)
                    <div class="p-2 border-t">
                        <div class="flex items-start mb-2">
                            <div
                                class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-white font-bold">
                                {{ substr($comment->username, 0, 1) }}
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">{{ $comment->username }}</h3>
                                <p class="text-xs text-gray-500 leading-none">{{ $comment->created_at->diffForHumans() }}</p>
                                <p class="text-gray-700">{{ $comment->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <a href="{{ route('articles.detail.index') }}"
            class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kembali
        </a>
    </div>

    {{-- modal create --}}
    <div id="modal-create" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Komentar
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="modal-create">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="{{ route('comment.store', $article->id) }}" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <input type="hidden" name="type" value="article">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Anonim" value="Anonim" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="content"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komentar</label>
                            <textarea id="content" rows="4" name="content"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500"
                                placeholder="input komentar"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex w-full justify-center items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
