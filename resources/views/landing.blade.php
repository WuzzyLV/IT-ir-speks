<x-app-layout class="h-screen" nav="false">
    <!-- prettier-ignore -->
    <div class="relative isolate overflow-hidden bg-gray-900 h-screen flex flex-col justify-center">
        <x-stars class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center"  />
        <div class="mx-12 md:mx-1 lg:mx-24 max-w-7xl ">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl ">
                    IT ir spēks
                    <span class="fas fa-hand-fist ml-4 " id="logo"></span>
                </h2>
                <style>
                    @keyframes shake {
                        0% { transform: rotate(0deg); }
                        20% { transform: rotate(-5deg); }
                        50% { transform: rotate(0deg); }
                        70% { transform: rotate(5deg); }
                        100% { transform: rotate(0deg); }
                    }
                </style>
                <p class="mt-6 text-lg leading-8 text-gray-300">Mēs esam darba iekārtošanas aģentūra, kura sniedz dažādas darba iespējas IT nozarē Latvijā </p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                    <a href="vacancies">Vakances <span aria-hidden="true">&rarr;</span></a>
                    <a href="news">Aktualitātes <span aria-hidden="true">&rarr;</span></a>
                </div>
                <dl class="mt-10 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Pieejamas vakances</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">XX</dd>
                    </div>
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Pieejami darba devēji</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">XXX+</dd>
                    </div>
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Darbinieku pieteikumi</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">XXX+</dd>
                    </div>
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Vidējā alga vakancēm</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">9,999 €</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
