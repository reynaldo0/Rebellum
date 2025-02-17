@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-lg p-6 mt-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Konsultasi</h2>

        <!-- Table -->
        <table class="min-w-full table-auto border-collapse text-sm text-gray-800">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Name</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Email</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Message</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Created At</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($consultations as $consultation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $consultation->name }}</td>
                        <td class="px-6 py-4">{{ $consultation->email }}</td>
                        <td class="px-6 py-4 max-w-xs truncate">{{ $consultation->message }}</td>
                        <td class="px-6 py-4">{{ $consultation->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
