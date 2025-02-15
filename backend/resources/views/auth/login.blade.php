<x-guest-layout>
    <div class="bg-white shadow-lg rounded-lg flex flex-col md:flex-row-reverse max-w-7xl h-screen md:h-[570px] w-full">
        <!-- Left Side (Illustration) -->
        <div class="w-full md:w-1/2 p-10 flex flex-col items-center justify-center">
            <img src="/illustrator/logo.png" alt="Illustration" class="w-60 md:w-60">
            <p class="text-gray-500 text-sm mt-2 px-5 text-center hidden md:block">
                Ayo mulai petualangan baru! Masukkan detail Anda untuk masuk dan nikmati kemudahan dalam mengelola
                konten dengan cepat dan efisien.
            </p>
            <img src="/illustrator/register.svg" alt="Illustration" class="mt-6 w-48 md:w-72 hidden md:block">
        </div>

        <!-- Right Side (Login Form) -->
        <div class="w-full md:w-1/2 p-10">
            <h2 class="text-sm text-gray-500">Akses Akun Anda</h2>
            <h1 class="text-2xl font-bold text-gray-900 mt-1">
                Masuk ke Dashboard
            </h1>
            <div class="flex justify-center md:hidden">
                <img src="/illustrator/register.svg" alt="Illustration" class="mt-6 w-48">
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300
                            text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
                    </label>
                </div>

                <!-- Login Button & Forgot Password -->
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none
                            focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Lupa Kata Sandi?') }}
                        </a>
                    @endif

                    <button class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                        {{ __('Masuk') }}
                    </button>
                </div>

                <p class="mt-4 text-sm text-gray-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
