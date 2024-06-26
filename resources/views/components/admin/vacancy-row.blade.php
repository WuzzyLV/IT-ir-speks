@props(['vacancy'])

<tr class="border-b-0 my-4 ">
    <td class="text-center">
        
        <p class="mb-1 text-base font-medium">
             @if (!$vacancy->visible)
                <i class="fa-solid fa-eye-slash mr-2"></i>
            @else
                <i class="fa-solid fa-eye mr-2"></i>
            @endif
            {{$vacancy->title}}
        </p>

    </td>
    <td class="hidden justify-center items-center xs:flex ">
        <div class="relative flex items-center gap-x-4">
            @if ($vacancy->file()->exists())
                <img src="{{ Storage::url($vacancy->file()->get()[0]->file_path) }}" alt="" class="h-10 w-10 rounded-full  bg-gray-50 object-contain border border-accent1" />
            @else
                <div class="flex justify-center items-center h-10 w-10 rounded-full  bg-gray-50 border border-accent1">
                    <i class="fa-solid fa-building "></i>
                </div>
            @endif
            <div class="leading-6">
                <p class="">
                {{$vacancy->company}}
                </p>
            </div>
        </div>
    </td>
    <td>
        <div class="flex items-center justify-center gap-x-2">
            <a
                href="{{ route("edit-vacancy", $vacancy->id) }}"
                class="btn btn-circle btn-outline btn-sm shadow"
            >
                <i class="fa-solid fa-pencil text-accent1"></i>
            </a>
            <form action="{{ route("delete-vacancy", $vacancy->id) }}" method="post">
                @csrf
                @method("DELETE")
                <button
                    type="submit"
                    class="btn btn-circle btn-outline btn-sm shadow"
                >
                    <i class="fa-solid fa-trash-can text-red-500"></i>
                </button>
            </form>
    </td>
</tr>
