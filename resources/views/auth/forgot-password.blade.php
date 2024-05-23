<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __("Aizmirsi savu paroli? Nekādu problēmu. Vienkārši paziņojiet mums savu e-pasta adresi, un mēs pa e-pastu nosūtīsim jums paroles atiestatīšanas saiti, kas ļaus jums izvēlēties jaunu.") }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route("password.email") }}">
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
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button>
                Iegūt paroles atiestatīšanas saiti
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
