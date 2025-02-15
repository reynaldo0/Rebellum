@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Riwayat Pengajuan Artikel</h2>

        <table class="w-full border-collapse border border-gray-300">
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
        </table>
    </div>
@endsection
