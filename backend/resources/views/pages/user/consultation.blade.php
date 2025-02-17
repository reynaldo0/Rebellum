@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-gray-700 mb-6">📝 Konsultasi</h2>

        <form action="{{ route('consultation.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700">Nama</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Masukkan nama" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Masukkan email" required>
            </div>

            <div>
                <label for="message" class="block text-sm font-semibold text-gray-700">Pesan</label>
                <textarea name="message" id="message" rows="4" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Tulis pesan Anda" required></textarea>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                Kirim Konsultasi
            </button>
        </form>
    </div>
@endsection
