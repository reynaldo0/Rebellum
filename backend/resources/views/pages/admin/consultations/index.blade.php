@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-lg p-6 mt-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Konsultasi</h2>

        <!-- Tabel dengan scroll horizontal -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse text-sm text-gray-800">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Email</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Telepon</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Lokasi</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Pesan</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Bukti</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-600">Dibuat Pada</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($consultations as $consultation)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $consultation->name }}</td>
                            <td class="px-6 py-4">{{ $consultation->email }}</td>

                            <!-- Kolom Telepon -->
                            <td class="px-6 py-4">{{ $consultation->phone ?? 'Tidak diberikan' }}</td>

                            <!-- Kolom Lokasi -->
                            <td class="px-6 py-4">{{ $consultation->location }}</td>

                            <!-- Kolom Pesan dengan konten yang dapat digulir -->
                            <td class="px-6 py-4 max-w-xs truncate">
                                <div class="max-h-32 overflow-auto">{{ $consultation->message }}</div>
                            </td>

                            <!-- Kolom Bukti -->
                            <td class="px-6 py-4">
                                @if ($consultation->forms)
                                    @php
                                        $fileExtension = pathinfo($consultation->forms, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ Storage::url($consultation->forms) }}" alt="Bukti"
                                            class="w-16 h-16 object-contain">
                                    @else
                                        <a href="{{ Storage::url($consultation->forms) }}" target="_blank"
                                            class="text-blue-500">Lihat File</a>
                                    @endif
                                @else
                                    <span class="text-gray-500">Tidak ada bukti</span>
                                @endif
                            </td>

                            <td class="px-6 py-4">{{ $consultation->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
