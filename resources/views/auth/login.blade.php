<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- EMAIL -->
            <div class="mb-5">

                <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Masukkan email..."
                    class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-900/20 focus:border-slate-900 transition"
                >

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            <!-- PASSWORD -->
            <div class="mb-5">

                <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan password..."
                    class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-900/20 focus:border-slate-900 transition"
                >

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            <!-- REMEMBER -->
            <div class="flex items-center justify-between mb-6">

                <label for="remember_me" class="flex items-center gap-2 text-sm text-slate-600">

                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="rounded border-slate-300 text-slate-900 focus:ring-slate-800"
                    >

                    Ingat saya

                </label>

                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm text-slate-500 hover:text-slate-900 transition"
                    >
                        Lupa password?
                    </a>

                @endif

            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full bg-slate-900 hover:bg-slate-800 text-white py-3 rounded-2xl font-semibold transition duration-300 shadow-lg"
            >
                Masuk
            </button>

        </form>

    </div>

</x-guest-layout>