<x-app-layout class="mt-10 bg-light1 sm:mt-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <x-breadcrumbs />
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2
                class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
            >
                Vakances
            </h2>
            <p class="text-lg mt-2 leading-8 text-gray-600">
                Atrodi savu sapņa darba vietu.
            </p>
        </div>
        <div
            class="mx-auto mt-10 grid max-w-2xl grid-cols-1 border-y border-gray-300 sm:mt-16 sm:gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-3"
        >
            @php
                $vacancies = \App\Models\Vacancy::all();
            @endphp

            @if($vacancies->isEmpty())
                <p class="text-center text-lg text-gray-600 col-span-full">Nav pieejamu vakanču!</p>
            @else
                @foreach ($vacancies as $vacancy)
                    <x-vacancy-card
                        h3Color="gray-900"
                        textColor="gray-600"
                        :vacancy="$vacancy"
                    />
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
