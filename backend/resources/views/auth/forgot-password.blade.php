<x-guest-layout>
    <div class="bg-white shadow-lg rounded-lg flex flex-col md:flex-row max-w-7xl h-screen md:h-[570px] w-full">
        <!-- Left Side (Illustration) -->
        <div class="w-full md:w-1/2 p-10 flex flex-col items-center justify-center">
            <img src="/illustrator/logo.png" alt="Illustration" class="w-60 md:w-60">
            <p class="text-gray-500 text-sm mt-2 px-5 text-center hidden md:block">
                Masukkan email Anda untuk mereset kata sandi dan mendapatkan akses kembali ke akun Anda.
            </p>
            <img src="/illustrator/forgot.svg" alt="Illustration" class="mt-6 w-48 md:w-72 hidden md:block">
        </div>

        <!-- Right Side (Forgot Password Form) -->
        <div class="w-full md:w-1/2 p-10">
            <h2 class="text-sm text-gray-500">Lupa Kata Sandi?</h2>
            <h1 class="text-2xl font-bold text-gray-900 mt-1">
                Atur Ulang Kata Sandi Anda
            </h1>
            <div class="flex justify-center md:hidden">
                <img src="/illustrator/forgot-password.svg" alt="Illustration" class="mt-6 w-48">
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="mt-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Reset Button -->
                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">Kembali ke Login</a>
                    <button class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                        {{ __('Kirim Link Reset') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
