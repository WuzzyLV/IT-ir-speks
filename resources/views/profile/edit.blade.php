<x-app-layout>
    <header class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8" name="header">
        <h2 class="text-3xl font-semibold leading-tight text-center text-gray-800">
            {{ __("Profils") }}
        </h2>
    </header>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                <div class="max-w-xl">
                    @include("profile.partials.update-profile-information-form")
                </div>
            </div>

            <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                <div class="max-w-xl">
                    @include("profile.partials.update-password-form")
                </div>
            </div>

            {{-- <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                <div class="max-w-xl">
                    @include("profile.partials.delete-user-form")
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
