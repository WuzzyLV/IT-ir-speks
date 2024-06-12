<x-app-layout>
    <div class="relative isolate overflow-hidden bg-light1 px-6 py-8 sm:py-32 lg:overflow-visible lg:px-0">
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start ">
            <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <x-breadcrumbs currentRoute="Anglijā atklāj 6g internetu" />
                    <div class="lg:max-w-lg">
                        <p class="text-base font-semibold leading-7 text-indigo-600">
                            <time datetime="{{ $news->created_at->format("Y. \g. j. F") }}">
                                {{ $news->created_at->format("Y. \g. j. F") }}
                            </time>
                        </p>
                        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            {{ $news->title }}
                        </h1>
                        <p class="mt-6 text-xl leading-8 text-gray-700">
                            {{ $news->desc }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="position m-0 p-4 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:-ml-12 lg:-mt-12 lg:overflow-hidden lg:p-12">
                <img class="w-full max-w-none rounded-xl bg-gray-900 shadow-xl ring-1 ring-gray-400/10 lg:h-[48rem] lg:w-[48rem]" src="https://i1.sndcdn.com/artworks-EZSvIHkxvqSQ2jTU-z0oCGA-t500x500.jpg" alt="" />
            </div>
            <div class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg">
                        {{ $news->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
