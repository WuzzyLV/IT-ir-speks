@props([
    "news",
])

<tr class="border-b-0">
    <td class="text-center">
        <p class="mb-1 text-base font-medium">
            @if (! $news->visible)
                <i class="fa-solid fa-eye-slash mr-2"></i>
            @else
                <i class="fa-solid fa-eye mr-2"></i>
            @endif
            {{ $news->title }}
        </p>
    </td>

    <td class="hidden h-[56px] items-center justify-center xs:flex">
        <time datetime="{{ date_format($news->created_at, "Y-m-d") }}">
            {{ BladeUtils::formatDate($news->created_at) }}
        </time>
    </td>
    <td>
        <div class="flex items-center justify-center gap-x-2">
            <a
                href="{{ route("edit-news", $news->id) }}"
                class="btn btn-circle btn-outline btn-sm shadow"
            >
                <i class="fa-solid fa-pencil text-accent1"></i>
            </a>
            <form action="{{ route("delete-news", $news->id) }}" method="post">
                @csrf
                @method("DELETE")
                <button
                    type="submit"
                    class="btn btn-circle btn-outline btn-sm shadow"
                >
                    <i class="fa-solid fa-trash-can text-red-500"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
