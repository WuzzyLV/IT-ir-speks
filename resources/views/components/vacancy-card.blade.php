@props(["textColor" => "", "h3Color" => "", "vacancy"])

<article class="max-w m-6 mx-4 flex max-w-xl flex-col items-start justify-between">
    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-400">
            Līdz {{ BladeUtils::formatDate($vacancy->deadline, true) }}
        </time>
        <form action="">
            <button type="submit" name="workload" value="{{$vacancy->workload}}" class="flex flex-row items-center justify-center relative z-10 rounded-full bg-gray-200 px-3 py-1.5 font-medium text-dark1 hover:bg-accent1">
                <i class="fa-regular fa-clock mr-1"></i> {{ $vacancy->workload }}
            </button>
        </form>

        <form action="">
            <button type="submit" name="city" value="{{$vacancy->city}}" class="flex flex-row items-center justify-center relative z-10 rounded-full bg-gray-200 px-3 py-1.5 font-medium text-dark1 hover:bg-accent1">
            <i class="fa-regular fa-location-dot mr-1"></i> {{ $vacancy->city }}
            </button>
        </form>
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
            @if ($vacancy->file()->exists())
                <img src="{{ Storage::url($vacancy->file()->get()[0]->file_path) }}" alt="" class="h-10 w-10 rounded-full border border-accent1 bg-gray-50 object-contain" />
            @else
                <div class="flex justify-center items-center h-10 w-10 rounded-full border border-accent1 bg-gray-50">
                    <i class="fa-solid fa-building "></i>
                </div>
            @endif  
        
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
                    @if ($vacancy->salary_min == $vacancy->salary_max)
                        {{ $vacancy->salary_min }} €
                    @else
                        {{ $vacancy->salary_min }} - {{$vacancy->salary_max}} €
                    @endif
                </div>
            </div>

            <!-- <p class="font-semibold text-gray-900">950 € - 1,110 €</p> -->
        </div>
    </div>
</article>
