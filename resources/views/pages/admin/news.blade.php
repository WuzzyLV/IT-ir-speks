<x-staff-layout class="flex w-full flex-col text-gray-900">
    <div
        class="flex items-center justify-between border-b border-gray-300 px-6 py-4 shadow lg:px-8"
    >
        <h2 class="text-lg font-bold tracking-tight sm:text-xl">
            Aktualitātes
        </h2>
        <a
            href="{{ route("new-news") }}"
            class="btn btn-sm border-accent1 bg-transparent text-accent1"
        >
            Jauna aktualitāte
        </a>
    </div>
    <div class="flex flex-grow flex-col">
        <div class="mx-8 flex-grow overflow-x-auto border-b border-b-gray-300">
            <table class="table">
                <!-- head -->
                <thead class="">
                    <tr class="border-b-gray-300 text-center text-gray-600">
                        <th class="">Virsraksts</th>
                        <th class="hidden xs:table-cell">Datums</th>
                        <th class="flex h-11 items-center justify-center">
                            <i class="fa-solid fa-circle text-4xs"></i>
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($news as $new)
                        <x-admin.news-row :news="$new" />
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-4 flex justify-center">
            <x-admin.pagination
                page="{{$page}}"
                totalPages="{{$total_pages}}"
            />
        </div>
    </div>
</x-staff-layout>
