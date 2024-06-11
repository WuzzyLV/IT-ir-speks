<x-staff-layout class="w-full flex flex-col text-gray-900">
    <div class=" flex items-center justify-between border-b border-gray-300 px-6 py-4 shadow lg:px-8">
        <h2 class="tracking-tight sm:text-xl text-lg font-bold">Aktualitātes</h2>
        <a href="{{route("new-news")}}" class="btn btn-sm border-accent1 bg-transparent text-accent1">
            Jauna aktualitāte
        </a>
    </div>
    <div class="flex-grow flex flex-col">
        <div class="mx-8 overflow-x-auto border-b-gray-300 border-b flex-grow ">
            <table class="table">
                <!-- head -->
                <thead class="">
                    <tr class="text-gray-600 text-center border-b-gray-300">
                        <th class="">Virsraksts</th>
                        <th class="hidden xs:table-cell">Datums</th>
                        <th class="flex justify-center items-center h-11"><i class="fa-solid fa-circle text-4xs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\News::all() as $news)
                        <x-admin.news-row :news="$news"/>
                    @endforeach
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
