<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="m-8 flex flex-col items-center justify-center text-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-700 sm:text-4xl">
            Esi sveicināts!
        </h1>

        <p class="mt-2 text-2xl leading-8">
            Ielogošanās sistēmā paredzēta darbiniekiem
        </p>

        <a
            href=" {{ route("landing") }}"
            class="m-4 inline-flex items-center rounded-md border border-transparent bg-accent1 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-dark1 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-accent1 focus:ring-offset-2 active:bg-gray-900"
        >
            DOTIES UZ GALVENO LAPU
        </a>
    </div>

    <form method="POST" action="{{ route("login") }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-pasts')" />
            <x-text-input
                id="email"
                class="mt-1 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Parole')" />

            <x-text-input
                id="password"
                class="mt-1 block w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 block">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-accent1 shadow-sm focus:ring-accent1"
                    name="remember"
                />
                <span class="ms-2 text-sm text-gray-600">
                    {{ __("Atcerēties mani") }}
                </span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
            @if (Route::has("password.request"))
                <a
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-accent1 focus:ring-offset-2"
                    href="{{ route("password.request") }}"
                >
                    Aizmirsi paroli?
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __("Ielogoties") }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
