@extends('layouts.admin')

@section('title', 'Artikel')

@section('content')
    <div class="relative overflow-x-auto">
        <div class="flex items-center justify-end mb-4">
            <a href="{{ route('articles.create') }}" data-modal-target="modal-create" data-modal-toggle="modal-create"
                class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded">
                Tambah Artikel
            </a>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dibuat oleh
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $article->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $article->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $article->status }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('articles.show', $article->id) }}"
                                class="inline-block bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-1 px-2 rounded">
                                <i class="bx bx-show"></i>
                            </a>
                            <a href="{{ route('articles.edit', $article->id) }}"
                                class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white text-sm font-bold py-1 px-2 rounded">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                            <form class="inline-block" method="POST" action="{{ route('articles.destroy', $article) }}">
                                @csrf
                                @method("DELETE")
                                <button class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-1 px-2 rounded">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>


                @endforeach
            </tbody>
        </table>
    </div>
@endsection
