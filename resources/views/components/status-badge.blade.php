@props(['status'])


<div
    class="badge badge-outline gap-2 border-gray-400 py-3 shadow"
>
@switch($status)
    @case('pending')
    <i class="fa-solid  fa-triangle-exclamation text-base text-yellow-400"></i>
            <p class="text-sm">Neizlemts</p>
        @break
    @case('accepted')
            <i
                class="fa-solid fa-check text-base text-green-500"
            ></i>
            <p class="text-sm">Apstiprināts</p>
        @break
    @case('denied') 
            <i
                class="fa-solid fa-x text-base text-red-500"
            ></i>
            <p class="text-sm">Noraidīts</p>
        @break
@endswitch
</div>

