<x-staff-layout class="text-gray-900">
    <div class="flex items-center justify-between border-b border-gray-300 px-6 py-4 shadow lg:px-8">

        <h2 class="tracking-tight sm:text-xl text-lg font-bold">Sākums</h2>
    </div>
    <dl class="grid grid-cols-1 text-center md:grid-cols-2 lg:grid-cols-3">
        <div class="mx-auto flex w-full flex-col gap-y-2 border-r border-r-gray-300 py-4">
            <dt class="text-base leading-7 text-gray-600">Pieteikumi</dt>
            <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                {{ \App\Models\Application::count() }}
            </dd>
        </div>
        <div class="mx-auto flex w-full flex-col gap-y-2 border-r border-r-gray-300 py-4">
            <dt class="text-base leading-7 text-gray-600">Vakances</dt>
            <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                {{ \App\Models\Vacancy::count() }}
            </dd>
        </div>
        <div class="mx-auto flex w-full flex-col gap-y-2 py-4">
            <dt class="text-base leading-7 text-gray-600">Aktualitātes</dt>
            <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                {{ \App\Models\News::count() }}
            </dd>
        </div>
        <div class="col-span-3 h-full border-t border-t-gray-300">
            <h2 class="text-lg sm:text-lg mx-6 flex items-center border-b border-b-gray-300 py-4 font-bold tracking-tight">
                Pēdējās darbības
            </h2>
            <table class="table">
                <!-- head -->

                <tbody>
                    <!-- row 1 -->
                    <tr class="my-4 border-b-0 align-middle">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                Izveidots lietotājs
                            </p>
                        </td>
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                MegaMind123
                            </p>
                            <p class="text-gray-400">coolman@auth.lv</p>
                        </td>
                        <td class="items-center justify-center text-center">
                            <div class="badge badge-outline h-auto gap-2 border-gray-400 py-1 shadow">
                                <i class="fa-solid fa-shield text-base text-accent1"></i>
                                <p class="text-sm">Administrators</p>
                            </div>
                        </td>
                    </tr>
                    <!-- row 2 -->
                    <tr class="my-4 border-b-0 align-middle">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                Izveidots lietotājs
                            </p>
                        </td>
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                MegaMind123
                            </p>
                            <p class="text-gray-400">coolman@auth.lv</p>
                        </td>
                        <td class="items-center justify-center text-center">
                            <div class="badge badge-outline h-auto gap-2 border-gray-400 py-1 shadow">
                                <i class="fa-solid fa-shield-halved text-base text-accent1"></i>
                                <p class="text-sm">Moderators</p>
                            </div>
                        </td>
                    </tr>
                    <!-- row 3 -->
                    <tr class="my-4 border-b-0 align-middle">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                Jauna aktualitāte
                            </p>
                        </td>
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                ProAdmin123
                            </p>
                            <p class="text-gray-400">admin@auth.lv</p>
                        </td>
                        <td class="text-center">
                            <p class="mb-1 line-clamp-1 text-base font-normal">
                                Kā 6g ieteikmē tavas smadzenes!?!?!
                            </p>
                        </td>
                    </tr>
                    <!-- row 4 -->
                    <tr class="my-4 border-b-0 align-middle">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                Jauna vakance
                            </p>
                        </td>
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                ProAdmin123
                            </p>
                            <p class="text-gray-400">admin@auth.lv</p>
                        </td>
                        <td class="text-center">
                            <p class="mb-1 line-clamp-1 text-base font-normal">
                                UML vecakais zimetājs
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </dl>
</x-staff-layout>
