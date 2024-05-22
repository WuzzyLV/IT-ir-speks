@props(["textColor" => "", "h3Color" => ""])
<article
    class="max-w m-6 mx-4 flex max-w-xl flex-col items-start justify-between"
>
    <img
        src="https://i1.sndcdn.com/artworks-EZSvIHkxvqSQ2jTU-z0oCGA-t500x500.jpg"
        class="mb-4 h-64 w-full rounded-2xl bg-gray-950/25 object-cover"
    />

    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-400">
            2024. g. 19. maijs
        </time>
    </div>

    <div class="group relative">
        <h3
            class="text-lg text-{{ $h3Color }} mt-3 font-semibold leading-6 group-hover:text-gray-600"
        >
            <a href="{{ route("news-page", 1) }}">
                <span class="absolute inset-0"></span>
                Anglijā izgudro 6G internetu
            </a>
        </h3>
        <p class="text-{{ $textColor }} mt-5 line-clamp-3 text-sm leading-6">
            Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam
            vitae illo. Non aliquid explicabo necessitatibus unde. Sed
            exercitationem placeat consectetur nulla deserunt vel. Iusto
            corrupti dicta.
        </p>
    </div>
</article>
