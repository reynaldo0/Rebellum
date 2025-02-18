@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-lg p-6 mt-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Konsultasi</h2>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
            <table class="min-w-full table-auto border-collapse text-sm text-gray-800">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Email</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Telepon</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Sekolah</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Alamat</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Kategori</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Deskripsi</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Bukti</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Deskripsi Bukti</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Urgensi</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Persetujuan</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Tanggal Dibuat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($consultations as $consultation)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $consultation->name }}</td>
                            <td class="px-6 py-4">{{ $consultation->email }}</td>
                            <td class="px-6 py-4">{{ $consultation->phone }}</td>
                            <td class="px-6 py-4">{{ $consultation->school }}</td>
                            <td class="px-6 py-4">{{ $consultation->address }}</td>
                            <td class="px-6 py-4">{{ $consultation->category }}</td>
                            <td class="px-6 py-4 max-w-xs truncate">{{ $consultation->description }}</td>
                            <td class="px-6 py-4">
                                @if ($consultation->evidence)
                                    @if (in_array(pathinfo($consultation->evidence, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                        <img src="{{ Storage::url($consultation->evidence) }}" alt="Bukti"
                                            class="w-16 h-16 object-contain">
                                    @else
                                        <a href="{{ Storage::url($consultation->evidence) }}" target="_blank"
                                            class="text-blue-500">Lihat File</a>
                                    @endif
                                @else
                                    <span class="text-gray-500">Tidak ada bukti</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $consultation->evidence_description ?? 'Tidak ada deskripsi' }}</td>
                            <td class="px-6 py-4">{{ $consultation->urgency }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $consultation->agreement ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $consultation->agreement ? 'Disetujui' : 'Tidak Disetujui' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $consultation->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
