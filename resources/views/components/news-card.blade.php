@props(["textColor" => "", "h3Color" => "", "news" => null])

<article
    class="max-w m-6 mx-4 flex max-w-xl flex-col items-start justify-start"
>
    <img
        @if ($news->file()->exists())
            src="{{ asset("storage/" . $news->file->file_path) }}"
        @else
            src="https://cc-prod.scene7.com/is/image/CCProdAuthor/What-is-Stock-Photography_P1_mobile?$pjpegBHT44BQk2cSSfHQbRyWTiLt4aUXYC60RD7MYdVkLpIpH9PbiaICgnGZII5lvfCRG6L3jtNpUSBrTCYiqLkTnKJ7zOin86wQih4EdTbFfTp1JqYlrLA9Sy5LwRu35JdolBjpegSize=200&wid=720"
        @endif
        class="mb-4 h-64 w-full rounded-2xl bg-gray-950/25 object-cover"
    />

    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-400">
            <!-- 2024. g. 19. maijs -->
            {{ BladeUtils::formatDate($news->created_at) }}
        </time>
    </div>

    <div class="group relative">
        <h3
            class="text-lg text-{{ $h3Color }} mt-3 font-semibold leading-6 group-hover:text-accent1"
        >
            <a href="{{ route("news-page", 1) }}">
                <span class="absolute inset-0"></span>
                {{ $news->title }}
            </a>
        </h3>
        <p class="text-{{ $textColor }} mt-5 line-clamp-3 text-sm leading-6">
            {{ $news->desc }}
        </p>
    </div>
</article>
