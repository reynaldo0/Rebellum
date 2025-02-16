<section class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <header>
        <h2 class="text-2xl font-semibold text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Upload Foto Profil -->
    <form method="POST" action="{{ route('profile.update.photo') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('POST')

        <div class="flex flex-col items-center">
            <label class="block font-medium text-gray-700 text-lg mb-4">Foto Profil</label>

            <div class="relative flex flex-col items-center">
                <!-- Foto Preview -->
                <img id="profilePreview" class="w-32 h-32 rounded-full object-cover border-2 border-gray-300 shadow-md"
                    src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) . '?' . time() : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"
                    alt="Foto Profil">

                <div class="mt-4 flex items-center gap-4">
                    <label for="profilePhotoInput"
                        class="cursor-pointer px-5 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                        Pilih Foto
                    </label>
                    <input type="file" name="profile_photo" id="profilePhotoInput" class="hidden" accept="image/*">
                </div>
            </div>

            @error('profile_photo')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <button type="submit"
                class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
                Simpan
            </button>
        </div>
    </form>

    <!-- Form Update Nama dan Email -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-lg" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full rounded-lg border-gray-300" :value="old('name', $user->name)" required autofocus
                autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-lg" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full rounded-lg border-gray-300" :value="old('email', $user->email)" required
                autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-blue-600 hover:text-blue-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <script>
        document.querySelector("#profilePhotoInput").addEventListener("change", function(event) {
            let form = document.querySelector("form[action='{{ route('profile.update.photo') }}']");
            let formData = new FormData(form);

            fetch(form.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('profilePreview').src = data.profile_photo + '?' + new Date()
                            .getTime();
                    } else {
                        alert('Gagal memperbarui foto.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</section>
