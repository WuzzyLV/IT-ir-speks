@props(["textColor" => "", "h3Color" => "", "vacancy"])

<article class="max-w m-6 mx-4 flex max-w-xl flex-col items-start justify-between">
    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-400">
            Līdz {{ BladeUtils::formatDate($vacancy->deadline, true) }}
        </time>
        <a href="#" class="relative z-10 rounded-full bg-gray-200 px-3 py-1.5 font-medium text-dark1 hover:bg-accent1">
            <i class="fa-solid fa-clock"></i> {{ $vacancy->workload }}
        </a>
        <a href="#" class="relative z-10 rounded-full bg-gray-200 px-3 py-1.5 font-medium text-dark1 hover:bg-accent1">
            <i class="fa-solid fa-location-pin"></i> {{ $vacancy->city }}
        </a>
    </div>
    <div class="group relative">
        <h3 class="text-lg text-{{ $h3Color }} mt-3 font-semibold leading-6 group-hover:text-accent1">
            <a href="{{ route("vacancy", $vacancy->id ) }}">
                <span class="absolute inset-0"></span>
                {{ $vacancy->title }}
            </a>
        </h3>
        <p class="text-{{ $textColor }} mt-5 line-clamp-3 text-sm leading-6">
            {{ $vacancy->desc }}
        </p>
    </div>
    <div class="mt-6 flex w-full items-end justify-between">
        <div class="relative flex items-center gap-x-4">
            <img @if ($vacancy->file()->exists())
            src="{{ asset("storage/" . $vacancy->file->file_path) }}"
            @else
            src="https://logos-world.net/wp-content/uploads/2020/06/Accenture-Emblem.png"
            @endif
            class="h-10 w-10 rounded-full border border-gray-400 bg-gray-50 object-contain"
            />
        
            <div class="leading-6">
                <p class="text-{{ $h3Color }}">
                    <a href="#" class="hover:text-accent1">{{ $vacancy->company }}</a>
                </p>
            </div>
        </div>
        <div>
            <div class="stat py-0 pr-0">
                <div class="text-lg stat-title">Alga</div>
                <div class="text-{{ $h3Color }} lg:text-lg stat-value text-sm">
                    {{ $vacancy->salary }} €
                </div>
            </div>

            <!-- <p class="font-semibold text-gray-900">950 € - 1,110 €</p> -->
        </div>
    </div>
</article>
