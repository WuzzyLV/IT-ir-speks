<x-app-layout class="bg-light1 mt-10 sm:mt-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2
                class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
            >
                Aktualitātes
            </h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">
                Uzzini, kas jauns un aktuāls IT nozarē visā pasaulē.
            </p>
        </div>
        <div
            class="mx-auto mt-10 grid max-w-2xl grid-cols-1 border-t border-gray-300 sm:mt-16 sm:gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-3"
        >
            <x-news-card />
            <x-news-card />
            <x-news-card />
            <x-news-card />
            <x-news-card />
            <x-news-card />
        </div>
    </div>
</x-app-layout>
