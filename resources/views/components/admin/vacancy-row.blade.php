@props(['vacancy'])

<tr class="border-b-0 my-4">
    <td class="text-center">
        <p class="mb-1 text-base font-medium">
            {{$vacancy->title}}
        </p>

    </td>
    <td class="hidden justify-center items-center xs:flex ">
        <div class="relative flex items-center gap-x-4">
            <img src="https://logos-world.net/wp-content/uploads/2020/06/Accenture-Emblem.png" alt="" class="h-10 w-10 rounded-full  bg-gray-50 object-contain" />
            <div class="leading-6">
                <p class="text-">
                    <a href="#" class="">{{$vacancy->company}}</a>
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
