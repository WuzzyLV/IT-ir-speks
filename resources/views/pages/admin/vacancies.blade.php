<x-staff-layout class="w-full flex flex-col text-gray-900">
    <div class=" flex items-center justify-between border-b border-gray-300 px-6 py-4 shadow lg:px-8">
        <h2 class="tracking-tight sm:text-xl text-lg font-bold">Vakances</h2>
        <a href="{{route("edit-vacancy", 1)}}" class="btn btn-sm border-accent1 bg-transparent text-accent1">
            Jauna vakance
        </a>
    </div>
    <div class="flex-grow flex flex-col">
        <div class="mx-8 overflow-x-auto border-b-gray-300 border-b flex-grow ">
            <table class="table">
                <!-- head -->
                <thead class="">
                    <tr class="text-gray-600 text-center border-b-gray-300">
                        <th class="">Nosaukums</th>
                        <th class="hidden xs:table-cell">Uzņēmums</th>
                        <th class="flex justify-center items-center h-11"><i class="fa-solid fa-circle text-4xs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="border-b-0 my-4">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                Vecakais UML diagrammu specalists
                            </p>

                        </td>
                        <td class="hidden justify-center items-center xs:flex ">
                            <div class="relative flex items-center gap-x-4">
                                <img src="https://logos-world.net/wp-content/uploads/2020/06/Accenture-Emblem.png" alt="" class="h-10 w-10 rounded-full  bg-gray-50 object-contain" />
                                <div class="leading-6">
                                    <p class="text-">
                                        <a href="#" class="">Accenture</a>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i class="fa-solid fa-pencil text-accent1"></i>
                                </a>
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                        </td>
                    </tr>
                    <!-- row 2 -->
                    <tr class="border-b-0 my-4">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                Vecakais UML diagrammu specalists
                            </p>

                        </td>
                        <td class="hidden justify-center items-center xs:flex ">
                            <div class="relative flex items-center gap-x-4">
                                <img src="https://logos-world.net/wp-content/uploads/2020/06/Accenture-Emblem.png" alt="" class="h-10 w-10 rounded-full  bg-gray-50 object-contain" />
                                <div class="leading-6">
                                    <p class="text-">
                                        <a href="#" class="">Accenture</a>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i class="fa-solid fa-pencil text-accent1"></i>
                                </a>
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                        </td>
                    </tr>
                    <!-- row 3 -->
                    <tr class="border-b-0 my-4">
                        <td class="text-center">
                            <p class="mb-1 text-base font-medium">
                                Vecakais UML diagrammu specalists
                            </p>

                        </td>
                        <td class="hidden justify-center items-center xs:flex ">
                            <div class="relative flex items-center gap-x-4">
                                <img src="https://logos-world.net/wp-content/uploads/2020/06/Accenture-Emblem.png" alt="" class="h-10 w-10 rounded-full  bg-gray-50 object-contain" />
                                <div class="leading-6">
                                    <p class="text-">
                                        <a href="#" class="">Accenture</a>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i class="fa-solid fa-pencil text-accent1"></i>
                                </a>
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="flex justify-center my-4">
            <div class="join border-gray-300">
                <button class="join-item btn bg-transparent text-gray-900 !border-gray-300 hover:bg-gray-300/50">«</button>
                <button class="join-item btn bg-transparent text-gray-900 !border-gray-300 hover:bg-gray-300/50 px-6">1</button>
                <button class="join-item btn bg-transparent text-gray-900 !border-gray-300 hover:bg-gray-300/50">»</button>
            </div>
        </div>
    </div>
</x-staff-layout>
