@props(["textColor" => "", "h3Color" => "", "news"])

@isset($news)
<article class="max-w m-6 mx-4 flex max-w-xl flex-col items-start justify-between">
    <img src="https://i1.sndcdn.com/artworks-EZSvIHkxvqSQ2jTU-z0oCGA-t500x500.jpg" class="mb-4 h-64 w-full rounded-2xl bg-gray-950/25 object-cover" />

    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="{{ $news->created_at->format("Y. \g. j. F") }}">
            {{ $news->created_at->format("Y. \g. j. F") }}
        </time>
    </div>

    <div class="group relative">
        <h3 class="text-lg text-{{ $h3Color }} mt-3 font-semibold leading-6 group-hover:text-accent1">
            <a href="{{ route('news-page', 1) }}">
                <span class="absolute inset-0"></span>
                {{ $news->title }}
            </a>
        </h3>
        <p class="text-{{ $textColor }} mt-5 line-clamp-3 text-sm leading-6">
            {{ $news->desc }}
        </p>
    </div>
</article>
@endisset
