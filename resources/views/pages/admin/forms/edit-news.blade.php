<x-staff-layout class="flex w-full flex-col text-gray-900">
    <div x-data>
        <div class="flex items-center justify-between px-6 py-4 shadow lg:px-8">
            <h2 class="text-lg font-bold tracking-tight sm:text-xl">{{$new ? "Jauna aktualitāte" : "Anglijā izgudro 6G internetu}"}}</h2>
            <div class="flex gap-1 flex-wrap justify-center">
                <a href="{{ route('admin-news') }}" class="btn btn-sm border-red-500 bg-transparent text-red-500">
                    Atpakaļ
                </a>
                <button @click="$refs.submit.click()" class="btn btn-sm border-accent1 bg-transparent text-accent1">
                    Saglabat
                </button>
            </div>
        </div>
        {{--show errors--}}
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center" role="alert">
            <strong class="font-bold fa-solid fa-triangle-exclamation"></strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
        </div>
        @endif
        <div class="flex flex-grow flex-col">
            <form class="mx-8" method="post">
                @csrf
                <input type="submit" value="submit" x-ref="submit" hidden>

                <div class="pb-12">

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 m-4">
                        <div class="sm:col-span-3">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                Virsraksts
                            </label>
                            <div class="mt-2">
                                <input type="text" name="title" id="title" required placeholder="Virsraksts" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6" />
                            </div>
                        </div>
                        
                        <!-- image -->
                        <div class="sm:col-span-3">
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">
                                Attēls
                            </label>
                            <div class="mt-2 flex items-center min-h-[36px] w-full bg-white rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <input name="logo" type="file" id="image" name="image" type="file" accept="image/*" autocomplete="new-image" placeholder="attels" class="ml-1" />

                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                Mazais apraksts
                            </label>
                            <div class="mt-2">
                                <textarea type="text" name="desc" id="desc" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6 bg-white pl-3 h-40">
                                </textarea>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="text" class="block text-sm font-medium leading-6 text-gray-900">
                                Teksts
                            </label>
                            <x-text-editor class="sm:col-span-6 mt-4" />

                        </div>

                        

                        
                        

                        

                    </div>
            </form>
        </div>
    </div>
    </div>
</x-staff-layout>
