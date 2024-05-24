@props(["textColor" => "", "h3Color" => ""])

<article
    class="max-w m-6 mx-4 flex max-w-xl flex-col items-start justify-between"
>
    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-400">
            Līdz 2024. g. 15. mar.
        </time>
        <a
            href="#"
            class="relative z-10 rounded-full bg-gray-200 px-3 py-1.5 font-medium text-gray-700 hover:bg-gray-300"
        >
            Pusslodze
        </a>
    </div>
    <div class="group relative">
        <h3
            class="text-lg text-{{ $h3Color }} mt-3 font-semibold leading-6 group-hover:text-accent1"
        >
            <a href="{{ route("vacancy", 1) }}">
                <span class="absolute inset-0"></span>
                Vecakais UML diagrammu specalists
            </a>
        </h3>
        <p class="text-{{ $textColor }} mt-5 line-clamp-3 text-sm leading-6">
            Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam
            vitae illo. Non aliquid explicabo necessitatibus unde. Sed
            exercitationem placeat consectetur nulla deserunt vel. Iusto
            corrupti dicta.
        </p>
    </div>
    <div class="mt-6 flex w-full items-end justify-between">
        <div class="relative flex items-center gap-x-4">
            <img
                src="https://logos-world.net/wp-content/uploads/2020/06/Accenture-Emblem.png"
                alt=""
                class="h-10 w-10 rounded-full border border-gray-400 bg-gray-50 object-contain"
            />
            <div class="leading-6">
                <p class="text-{{ $h3Color }}">
                    <a href="#" class="">Accenture</a>
                </p>
            </div>
        </div>
        <div>
            <div class="stat py-0 pr-0">
                <div class="text-lg stat-title">Alga</div>
                <div class="text-{{ $h3Color }} lg:text-lg stat-value text-sm">
                    950 € - 1,110 €
                </div>
            </div>
            <!-- <p class="font-semibold text-gray-900">950 € - 1,110 €</p> -->
        </div>
    </div>
</article>
