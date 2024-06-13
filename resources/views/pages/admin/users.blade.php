<x-staff-layout class="w-full flex flex-col text-gray-900">
    <div
        class=" flex items-center justify-between border-b border-gray-300 px-6 py-4 shadow lg:px-8"
    >
        <h2 class="tracking-tight sm:text-xl text-lg font-bold">Lietotāji</h2>
        <a
            href="{{ route('new-user') }}"
            class="btn btn-sm border-accent1 bg-transparent text-accent1"
        >
            Jauns lietotājs
        </a>
    </div>
    @if (session("success"))
        <x-alert type="success">
            {{ session("success") }}
        </x-alert>
        @endif
    <div class="flex-grow flex flex-col">
        <div class="mx-8 overflow-x-auto border-b-gray-300 border-b flex-grow ">
            <table class="table">
                <!-- head -->
                <thead class="">
                    <tr class="text-gray-600 text-center border-b-gray-300">
                        <th class="">Lietotājs</th>
                        <th class="hidden xs:table-cell">Pakāpe</th>
                        <th class="flex justify-center items-center h-11"><i class="fa-solid fa-circle text-4xs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <x-admin.user-row :user="$user"/>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-center my-2">
              <x-admin.pagination page="{{$page}}" totalPages="{{$total_pages}}"/>
        </div>
    </div>
</x-staff-layout>
