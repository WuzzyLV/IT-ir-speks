<x-staff-layout class="flex w-full flex-col text-gray-900">
    <div x-data>
        <div class="flex items-center justify-between px-6 py-4 shadow lg:px-8">
            <h2 class="text-lg font-bold tracking-tight sm:text-xl">{{$vacancy->title ?? "Jauna vakance"}}</h2>
            <div class="flex gap-1 flex-wrap justify-center">
                <a href="{{ route('admin-vacancies') }}" class="btn btn-sm border-red-500 bg-transparent text-red-500">
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
            <form class="mx-8">
                @csrf
                <input type="submit" value="submit" x-ref="submit" hidden>

                <div class="pb-12">
                    <div class="my-6 border-b border-b-gray-300 pb-4">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">
                            Vakance
                        </h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">
                            Veic vakaņču datu apskati vai maiņu šeit.

                        </p>
                    </div>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                Nosaukums
                            </label>
                            <div class="mt-4">
                                <input type="text" name="title" id="title" placeholder="Vecakais UML diagrammu specalists" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->title : ""}}" />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="company" class="block text-sm font-medium leading-6 text-gray-900">
                                Kompanija
                            </label>
                            <div class="mt-4">
                                <input type="text" name="company" id="company" placeholder="SIA Kaka" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->company : ""}}" />
                            </div>
                        </div>



                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                Apraksts
                            </label>
                            <x-text-editor class="sm:col-span-6 mt-4" value="{{$vacancy ? $vacancy->desc : ""}}" />

                        </div>





                        <div class="sm:col-span-3">
                            <label for="website" class="block text-sm font-medium leading-6 text-gray-900">
                                Mājaslapa
                            </label>
                            <div class="mt-2">
                                <input type="text" name="website" id="website" placeholder="https://kaka.lv/" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->website : ""}}" />
                            </div>
                        </div>


                        <div class="sm:col-span-3">
                            <label for="logo" class="block text-sm font-medium leading-6 text-gray-900">
                                Logo
                            </label>
                            <div class="mt-2 flex items-center min-h-[36px] w-full bg-white rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <input name="logo" type="file" class="ml-1" value="{{$vacancy ? $vacancy->file_id : ""}}" />

                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="website" class="block text-sm font-medium leading-6 text-gray-900">
                                Pilseta
                            </label>
                            <div class="mt-2">
                                <input type="text" name="website" id="website" placeholder="https://kaka.lv/" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->city : ""}}" />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="workload" class="block text-sm font-medium leading-6 text-gray-900">
                                Slodze
                            </label>
                            <div class="mt-2">
                                <select id="workload" name="workload" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->workload : ""}}">
                                    <option>Pilna</option>
                                    <option>Nepilna</option>
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">
                                Alga €
                            </label>
                            <div class="mt-2">
                                <input id="salary" name="salary" type="number" min="0" placeholder="600" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->salary : ""}}" />
                            </div>
                        </div>


                        <div class="sm:col-span-2">
                            <label for="date" class="block text-sm font-medium leading-6 text-gray-900">
                                Pieteikšanās termiņš
                            </label>
                            <div class="mt-2 flex items-center h-[36px] ">
                                <input name="date" type="date" class="w-full bg-white rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->deadline : ""}}" />

                            </div>
                        </div>


                    </div>
            </form>
        </div>
    </div>
    </div>
</x-staff-layout>
