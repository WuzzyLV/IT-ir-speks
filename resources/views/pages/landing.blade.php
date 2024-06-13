<x-app-layout class="bg-[#090a0f]" landing="true" footer="false">
    <!-- prettier-ignore -->
    <div class="relative isolate overflow-hidden h-screen flex flex-col justify-center">
        <x-stars class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center" />
        <div class="mx-12 md:mx-1 lg:mx-24 max-w-7xl ">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl flex items-center">
                    <span class="fas fa-hand-fist mr-8 text-5xl" id="logo"></span>
                    IT ir spēks
                </h2>
                <style>
                    @keyframes shake {
                        0% {
                            transform: rotate(0deg);
                        }

                        20% {
                            transform: rotate(-5deg);
                        }

                        50% {
                            transform: rotate(0deg);
                        }

                        70% {
                            transform: rotate(5deg);
                        }

                        100% {
                            transform: rotate(0deg);
                        }
                    }

                </style>
                <p class="mt-6 text-lg leading-8 text-gray-300">Mēs esam darba iekārtošanas aģentūra, kura sniedz
                    dažādas darba iespējas IT nozarē Latvijā </p>
            </div>
            @php
                $vacanciesCount = \App\Models\Vacancy::count();
                $applicationsCount = \App\Models\Application::count();
                $uniqueCompaniesCount = \App\Models\Vacancy::distinct('company')->count('company');
                
                $vacancies = \App\Models\Vacancy::selectRaw('((salary_min + salary_max) / 2) as midpoint')->get();
                $averageSalary = $vacancies->avg('midpoint');      
            @endphp

            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <dl class="mt-10 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Pieejamas vakances</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">{{ $vacanciesCount }}</dd>
                    </div>
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Pieejami darba devēji</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">{{ $uniqueCompaniesCount }}</dd>
                    </div>
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Darbinieku pieteikumi</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">{{ $applicationsCount }}</dd>
                    </div>
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Vidējā alga vakancēm </dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">{{ number_format($averageSalary, 2) }} €</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    @if (\App\Models\Vacancy::exists())
    <div class="m-8 mx-auto mt-0 max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <a class="cursor-pointer text-3xl font-bold tracking-tight text-light1 hover:text-accent1 sm:text-4xl" href="{{ route("vacancies") }}">
                Jaunākās vakances
            </a>
            <p class="text-lg mt-2 leading-8 text-gray-300">
                Nesen pievienotās vakances.
            </p>
        </div>
        <div class="mx-auto mt-4 grid max-w-2xl grid-cols-1 border-t border-gray-300/50 sm:mt-6 sm:gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @php
            $vacancies = \App\Models\Vacancy::latest()
            ->limit(3)
            ->get();
            @endphp

            @foreach ($vacancies as $vacancy)
            <x-vacancy-card h3Color="white" textColor="gray-300" :vacancy="$vacancy" />
            @endforeach
        </div>
    </div>
    @endif

    <div class="m-8 mx-auto mb-0 max-w-7xl px-6 lg:px-8">
        @if (\App\Models\Vacancy::exists())
            <div class="mx-auto max-w-2xl lg:mx-0">
                <a
                    class="cursor-pointer text-3xl font-bold tracking-tight text-light1 hover:text-accent1 sm:text-4xl"
                    href="{{ route("news") }}"
                >
                    Jaunākās aktualitātes
                </a>
                <p class="text-lg mt-2 leading-8 text-gray-300">
                    Nesen pievienotās aktualitātes.
                </p>
            </div>
        @endif

        @if (\App\Models\News::exists())
        <div class="mx-auto mt-4 grid max-w-2xl grid-cols-1 border-t border-gray-300/50 sm:mt-6 sm:gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @php
            $news = \App\Models\News::latest()
            ->limit(3)
            ->get();
            @endphp

            @foreach ($news as $new)
            <x-news-card h3Color="white" textColor="gray-300" :news="$new" />
            @endforeach
        </div>
        @endif
    </div>

    <style>
        main {
            background: radial-gradient(ellipse at bottom,
                    #222823 0%,
                    #090a0f 100%) !important;
        }

    </style>

    @include("components.footer", ["class" => "text-gray-300"])
</x-app-layout>
