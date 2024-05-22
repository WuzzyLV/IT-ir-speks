<x-staff-layout class="w-full flex flex-col text-gray-900">
    <div
        class=" flex items-center justify-between border-b border-gray-300 px-6 py-4 shadow lg:px-8"
    >
        <h2 class="tracking-tightsm:text-xl text-lg font-bold">Lietotāji</h2>
        <a
            href="#"
            class="btn btn-sm border-accent bg-transparent text-accent1"
        >
            Jauns lietotājs
        </a>
    </div>
    <div class="flex-grow flex flex-col">
        <div class="mx-8 overflow-x-auto border-b-gray-300 border-b flex-grow ">
            <table class="table">
                <!-- head -->
                <thead class="">
                    <tr class="text-gray-600 text-center border-b-gray-300">
                        <th class="">Lietotājs</th>
                        <th class="">Pakāpe</th>
                        <th class="flex justify-center items-center h-11"><i class="fa-solid fa-circle text-4xs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="border-b-0 my-4">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                MegaMind123
                            </p>
                            <p class="text-gray-400">coolman@auth.lv</p>
                        </td>
                        <td class="flex justify-center items-center">
                            <div
                                class="badge badge-outline gap-2 border-gray-400 py-3 shadow"
                            >
                                <i
                                    class="fa-solid fa-shield text-base text-accent1"
                                ></i>
                                <p class="text-sm">Administrators</p>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i
                                        class="fa-solid fa-pencil text-accent1"
                                    ></i>
                                </a>
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i
                                        class="fa-solid fa-trash-can text-red-500"
                                    ></i>
                                </a>
                        </td>
                    </tr>
                    <!-- row 2 -->
                    <tr class="border-b-0 my-4">
                    <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                MegaMind123
                            </p>
                            <p class="text-gray-400">coolman@auth.lv</p>
                        </td>
                        <td class="flex justify-center">
                            <div
                                class="badge badge-outline gap-2 border-gray-400 py-3 shadow"
                            >
                                <i
                                    class="fa-solid fa-shield text-base text-accent1"
                                ></i>
                                <p class="text-sm">Administrators</p>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i
                                        class="fa-solid fa-pencil text-accent1"
                                    ></i>
                                </a>
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i
                                        class="fa-solid fa-trash-can text-red-500"
                                    ></i>
                                </a>
                        </td>
                    </tr>
                    <!-- row 3 -->
                    <tr class="border-b-0  my-4">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                MegaMind123
                            </p>
                            <p class="text-gray-400">coolman@auth.lv</p>
                        </td>
                        <td class="flex justify-center">
                            <div
                                class="badge badge-outline gap-2 border-gray-400 py-3 shadow"
                            >
                                <i
                                    class="fa-solid fa-shield-halved text-base text-accent1"
                                ></i>
                                <p class="text-sm">Moderators</p>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i
                                        class="fa-solid fa-pencil text-accent1"
                                    ></i>
                                </a>
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i
                                        class="fa-solid fa-trash-can text-red-500"
                                    ></i>
                                </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-center my-4">
            <div class="join border-gray-300">
                <button class="join-item btn bg-transparent text-gray-900 border-gray-300">«</button>
                <button class="join-item btn bg-transparent text-gray-900 border-gray-300 px-6">1</button>
                <button class="join-item btn bg-transparent text-gray-900 border-gray-300">»</button>
            </div>
        </div>
    </div>
</x-staff-layout>
