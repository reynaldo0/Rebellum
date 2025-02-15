@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Riwayat Pengajuan Artikel</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($articles->isEmpty())
            <p class="text-gray-600">Belum ada artikel yang diajukan.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Judul</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Tanggal Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($articles as $article)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left font-medium">{{ $article->title }}</td>
                                <td class="py-3 px-6 text-center">
                                    @if ($article->status === 'pending')
                                        <span class="bg-yellow-400 text-white py-1 px-3 rounded-full text-xs">Menunggu
                                            Persetujuan</span>
                                    @elseif($article->status === 'approved')
                                        <span
                                            class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">Disetujui</span>
                                    @else
                                        <span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">Ditolak</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">{{ $article->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
@endsection
