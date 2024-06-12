@props(["isVacancies"])

<div class="flex min-h-screen items-center justify-center">
        <div class="rounded-lg px-16 py-14">
            <div class="flex justify-center">
                <div class="rounded-full bg-green-200 p-6">
                    <i class="fas fa-sad-cry text-accent1 fa-10x"></i>
                </div>
            </div>

            @if($isVacancies)
                <h3 class="my-4 text-center text-3xl font-semibold text-gray-700">Nav vakanču!</h3>
            @else
                <h3 class="my-4 text-center text-3xl font-semibold text-gray-700">Nav aktualitāšu!</h3>
            @endif

            <p class="w-[230px] text-center font-normal text-gray-600">Atvainojamies par sagādātajām neērtībām!</p>

        </div>
    </div>
