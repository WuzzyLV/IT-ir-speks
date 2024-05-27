<x-staff-layout class="w-full flex flex-col text-gray-900">
<div class=" flex items-center justify-between border-b border-gray-300 px-6 py-4 shadow lg:px-8">
        <h2 class="tracking-tightsm:text-xl text-lg font-bold">Pieteikumi</h2>
        <!-- <a href="{{route("edit-news",1)}}" class="btn btn-sm border-accent1 bg-transparent text-accent1">
            Jauna aktualitāte
        </a> -->
    </div>
    <div class="flex-grow flex flex-col">
        <div class="mx-2 md:mx-8 overflow-x-auto border-b-gray-300 border-b flex-grow ">
            <table class="table">
                <!-- head -->
                <thead class="">
                    <tr class="text-gray-600 text-center border-b-gray-300">
                        <th class="">Vārds uzvārds</th>
                        <th class="hidden md:table-cell">E-pasts</th>
                        <th class="">Vakance</th>
                        <th class="hidden sm:table-cell">CV</th>
                        <th class="flex justify-center items-center h-11"><i class="fa-solid fa-circle text-4xs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="border-b-0 my-4 text-sm md:text-base">
                        <td class="text-center">
                            <p class="mb-1 font-medium">
                                Peteriks Volteris
                            </p>
                        </td>
                        
                        <td class="text-center hidden md:table-cell">
                            <p class="mb-1 font-medium">
                                ppSlayer123@inbox.lv
                            </p>
                        </td>

                        <td class="text-center">
                            <!-- <time datetime="2020-03-16">
                                2024. g. 19. maijs
                            </time> -->
                            <p class="mb-1 font-medium">
                            Vecakais UML diagrammu specalists
                            </p>
                        </td>

                        <td class="text-center hidden sm:table-cell">
                            <a href="" >
                                <i class="fa-solid fa-paperclip text-center text-accent1 hover:underline"></i>
                            </a>
                        </td>

                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow" href="{{route("view-application", 1)}}">
                                    <i class="fa-solid fa-eye text-accent1"></i>
                                </a>
                                <a class="btn btn-circle btn-outline btn-sm shadow">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                        </td>
                    </tr>

                    <!-- row 2 -->
                    <tr class="border-b-0 my-4 text-sm md:text-base">
                        <td class="text-center">
                            <p class="mb-1 font-medium">
                                Loinards Petersilis
                            </p>
                        </td>
                        
                        <td class="text-center hidden md:table-cell">
                            <p class="mb-1 font-medium">
                                loinardsSlaysXX@inbox.lv
                            </p>
                        </td>

                        <td class="text-center">
                            <!-- <time datetime="2020-03-16">
                                2024. g. 19. maijs
                            </time> -->
                            <p class="mb-1 font-medium">
                            Vecakais UML diagrammu specalists
                            </p>
                        </td>

                        <td class="text-center hidden sm:table-cell">
                            <a href="" >
                                <i class="fa-solid fa-paperclip text-center text-accent1 hover:underline"></i>
                            </a>
                        </td>

                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow" href="{{route("view-application", 1)}}">
                                    <i class="fa-solid fa-eye text-accent1"></i>
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
