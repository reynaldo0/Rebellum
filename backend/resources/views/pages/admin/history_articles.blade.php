@extends('layouts.admin')

@section('title', 'Riwayat Pengajuan Artikel')

@section('content')
    <div class="">
        {{-- <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">No</th>
                    <th class="border border-gray-300 p-2">Judul</th>
                    <th class="border border-gray-300 p-2">Diajukan Oleh</th>
                    <th class="border border-gray-300 p-2">Tanggal Pengajuan</th>
                    <th class="border border-gray-300 p-2">Status</th>
                    <th class="border border-gray-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $index => $article)
                <tr class="text-center">
                    <td class="border border-gray-300 p-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 p-2">{{ $article->title }}</td>
                    <td class="border border-gray-300 p-2">{{ $article->user->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $article->created_at->format('d M Y') }}</td>
                    <td class="border border-gray-300 p-2">
                        @if ($article->status === 'pending')
                        <span class="text-yellow-500 font-bold">Pending</span>
                        @elseif ($article->status === 'approved')
                        <span class="text-green-500 font-bold">Disetujui</span>
                        @else
                        <span class="text-red-500 font-bold">Ditolak</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 p-2 flex justify-center gap-2">
                        @if ($article->status === 'pending')
                        <form action="{{ route('articles.approve', $article->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Setujui</button>
                        </form>

                        <form action="{{ route('articles.reject', $article->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">Tolak</button>
                        </form>
                        @else
                        <button class="bg-gray-400 text-white px-4 py-1 rounded cursor-not-allowed">Selesai</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}

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
                        Diajukan oleh
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengajuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
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
                        <td class="px-6 py-4">{{ $article->title }}</td>
                        <td class="px-6 py-4">{{ $article->user->name }}</td>
                        <td class="px-6 py-4">{{ $article->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @if ($article->status === 'pending')
                                <span class="text-yellow-500 font-bold">Pending</span>
                            @elseif ($article->status === 'approved')
                                <span class="text-green-500 font-bold">Disetujui</span>
                            @else
                                <span class="text-red-500 font-bold">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            @if ($article->status === 'pending')
                                <a href="{{ route('articles.detail.show', $article->id) }}"
                                    class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-600">
                                    <i class='bx bx-show'></i>
                                </a>

                                <form action="{{ route('articles.approve', $article->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">
                                        <i class='bx bx-check'></i>
                                    </button>
                                </form>

                                <form action="{{ route('articles.reject', $article->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">
                                        <i class='bx bx-x'></i>
                                    </button>
                                </form>
                            @else
                            <a href="{{ route('articles.detail.show', $article->id) }}"
                                class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-600">
                                <i class='bx bx-show'></i>
                            </a>
                                {{-- <button class="bg-gray-400 text-white px-4 py-1 rounded cursor-not-allowed w-full">Selesai</button> --}}
                            @endif
                        </td>
                    </tr>


                @endforeach
            </tbody>
        </table>
    </div>
@endsection
