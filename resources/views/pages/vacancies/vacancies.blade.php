<x-app-layout class="mt-10 bg-light1 sm:mt-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <x-breadcrumbs />
        <div class="mx-auto flex max-w-2xl justify-between lg:mx-0">
            <div>
                <h2
                    class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                >
                    {{ $msg }}
                </h2>

                <p class="text-lg mt-2 leading-8 text-gray-600">
                    Atrodi savu sapņa darba vietu.
                </p>
            </div>

            @if (request()->has("city") || request()->has("workload"))
                <div class="flex items-center">
                    <a
                        href="{{ route("vacancies") }}"
                        class="fa-solid fa-filter-circle-xmark text-2xl text-gray-900 hover:scale-105 hover:text-accent1"
                    ></a>
                </div>
            @endif
        </div>

        @if ($vacancies->isEmpty())
            <x-empty-state :isVacancies="true" />
        @else
            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 border-y border-gray-300 sm:mt-16 sm:gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                @foreach ($vacancies as $vacancy)
                    <x-vacancy-card
                        h3Color="gray-900"
                        textColor="gray-600"
                        :vacancy="$vacancy"
                    />
                @endforeach
            </div>
        @endif
    </div>
    @if ($vacancies->isNotEmpty())
        <div class="my-4 flex justify-center">
            <x-admin.pagination
                page="{{$page}}"
                totalPages="{{$total_pages}}"
            />
        </div>
    @endif
</x-app-layout>
