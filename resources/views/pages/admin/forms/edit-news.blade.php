<x-staff-layout class="flex w-full flex-col text-gray-900">
    <div x-data>
        <div class="flex items-center justify-between px-6 py-4 shadow lg:px-8">
            <h2 class="text-lg font-bold tracking-tight sm:text-xl">
                {{ $new ? "Jauna aktualitāte" : $news->title }}
            </h2>
            <div class="flex flex-wrap justify-center gap-1">
                <a
                    href="{{ route("admin-news") }}"
                    class="btn btn-sm border-red-500 bg-transparent text-red-500"
                >
                    Atpakaļ
                </a>
                <button
                    @click="$refs.submit.click()"
                    class="btn btn-sm border-accent1 bg-transparent text-accent1"
                >
                    Saglabat
                </button>
            </div>
        </div>
        {{-- show errors --}}
        @if ($errors->any())
            <div
                class="relative rounded border border-red-400 bg-red-100 px-4 py-3 text-center text-red-700"
                role="alert"
            >
                <strong
                    class="fa-solid fa-triangle-exclamation font-bold"
                ></strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <div class="flex flex-grow flex-col">
            <form class="mx-8" method="post" enctype="multipart/form-data">
                @csrf
                <input type="submit" value="submit" x-ref="submit" hidden />

                <div class="pb-12">
                    <div
                        class="m-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                    >
                        <div class="sm:col-span-3">
                            <label
                                for="title"
                                class="block text-sm font-medium leading-6 text-gray-900"
                            >
                                Virsraksts
                            </label>
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    required
                                    placeholder="Virsraksts"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6"
                                    value="{{$news ? $news->title : ""}}"
                                />
                            </div>
                        </div>

                        <!-- image -->
                        <div class="sm:col-span-3">
                            <label
                                for="image"
                                class="block text-sm font-medium leading-6 text-gray-900"
                            >
                                Attēls
                            </label>
                            <div
                                class="mt-2 flex min-h-[36px] w-full items-center rounded-md border-0 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            >
                                <input
                                    name="image"
                                    type="file"
                                    id="image"
                                    name="image"
                                    type="file"
                                    accept="image/*"
                                    autocomplete="new-image"
                                    placeholder="attels"
                                    class="ml-1"
                                    
                                />
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label
                                for="desc"
                                class="block text-sm font-medium leading-6 text-gray-900"
                            >
                                Apraksts
                            </label>
                            <div class="mt-2">
                                <textarea
                                    type="text"
                                    name="desc"
                                    id="desc"
                                    placeholder="Ievadi mazu aprakstu"
                                    required
                                    class="block h-40 w-full rounded-md border-0 bg-white py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6"
                                    
                                >{{$news ? $news->desc : ""}}</textarea>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                            >
                                Teksts
                            </label>
                            <x-text-editor class="mt-4 sm:col-span-6">
                                @if ($news)
                                    {!! $news->content !!}
                                @else
                                    <h1>Tava ģeniālais ziņojums</h1>
                                    <p>Apraksti savu aktualitāti</p>
                                @endif
                            </x-text-editor>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-staff-layout>
