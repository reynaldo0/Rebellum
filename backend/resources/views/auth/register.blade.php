<x-guest-layout>
    <div class="bg-white shadow-lg rounded-lg flex flex-col md:flex-row max-w-7xl h-auto md:h-[570px] w-full">
        <!-- Left Side (Illustration) -->
        <div class="w-full md:w-1/2 p-10 flex flex-col items-center justify-center">
            <img src="/illustrator/logo.png" alt="Illustration" class="w-60 md:w-60">
            <p class="text-gray-500 text-sm mt-2 px-5 text-center hidden md:block">
                Buat akun anda dan kuasai pengalaman baru dengan mendaftar sekarang dan nikmati fitur eksklusif yang kami tawarkan!
            </p>
            <img src="/illustrator/register.svg" alt="Illustration" class="mt-6 w-48 md:w-72 hidden md:block">
        </div>
        <!-- Right Side (Register Form) -->
        <div class="w-full md:w-1/2 p-10">
            <h2 class="text-sm text-gray-500">Kelola Konten dengan Mudah</h2>
            <h1 class="text-2xl font-bold text-gray-900 mt-1">
                Daftar Sekarang untuk Mengakses Dashboard
            </h1>
            <div class="flex justify-center md:hidden">
                <img src="/illustrator/register.svg" alt="Illustration" class="mt-6 w-48">
            </div>
            <form method="POST" action="{{ route('register') }}" class="mt-6">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button class="w-full mt-6 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    {{ __('Daftar') }}
                </button>

                <p class="mt-4 text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk</a>
                </p>
            </form>
        </div>

    </div>
</x-guest-layout>
