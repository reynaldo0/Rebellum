@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-gray-700 mb-6">📝 Konsultasi</h2>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('consultation.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <label for="phone" class="block text-sm font-semibold text-gray-700">Telepon (Opsional)</label>
                <input type="text" name="phone" id="phone" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Masukkan nomor telepon">
            </div>

            <div>
                <label for="school" class="block text-sm font-semibold text-gray-700">Sekolah (Opsional)</label>
                <input type="text" name="school" id="school" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Nama sekolah">
            </div>

            <div>
                <label for="address" class="block text-sm font-semibold text-gray-700">Alamat (Opsional)</label>
                <input type="text" name="address" id="address" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Alamat lengkap">
            </div>

            <div>
                <label for="category" class="block text-sm font-semibold text-gray-700">Kategori Konsultasi</label>
                <select name="category" id="category" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Sosial">Kesadaran Sosial</option>
                    <option value="Mental">Kesehatan Mental</option>
                    <option value="Minat">Kepribadian dan Minat</option>
                    <option value="Sehat">Hubungan Sehat</option>
                    <option value="Digital">Digital Awareness</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700">Deskripsi Masalah</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Jelaskan masalah atau pertanyaan Anda" required></textarea>
            </div>

            <div>
                <label for="evidence" class="block text-sm font-semibold text-gray-700">Bukti Pendukung (Opsional)</label>
                <input type="file" name="evidence" id="evidence" class="w-full p-3 border border-gray-300 rounded-md">
                <small class="text-gray-500">Format: jpg, jpeg, png, mp4, mov, avi (Maksimal 20MB)</small>
            </div>

            <div>
                <label for="evidence_description" class="block text-sm font-semibold text-gray-700">Deskripsi Bukti (Opsional)</label>
                <textarea name="evidence_description" id="evidence_description" rows="2"
                    class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Jelaskan bukti yang Anda lampirkan"></textarea>
            </div>

            <div>
                <label for="urgency" class="block text-sm font-semibold text-gray-700">Tingkat Urgensi</label>
                <select name="urgency" id="urgency" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <option value="Rendah">Rendah</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Tinggi">Tinggi</option>
                </select>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="agreement" id="agreement" class="mr-2" required>
                <label for="agreement" class="text-sm text-gray-700">
                    Saya menyetujui syarat dan ketentuan yang berlaku.
                </label>
            </div>

            <button type="submit"
                class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                Kirim Konsultasi
            </button>
        </form>
    </div>
@endsection
