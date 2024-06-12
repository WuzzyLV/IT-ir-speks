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
                    @foreach(\App\Models\Activity::latest()->take(6)->get() as $activity)
                        <x-admin.activity-row :activity="$activity"/>
                    @endforeach

                </tbody>
            </table>
        </div>
    </dl>
</x-staff-layout>
