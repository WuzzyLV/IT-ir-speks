<x-staff-layout class="flex w-full flex-col text-gray-900">
    <div x-data="{
            deleting: false,
            deleteImage() {
                this.deleting = true
                axios
                    .delete(
                        '{{ $vacancy && $vacancy->file ? route("delete-vacancy-image", ["id" => $vacancy->id]) : "" }}',
                    )
                    .then((response) => {
                        this.deleting = false
                        console.log('Image deleted:', response)
                        window.location.reload()
                    })
                    .catch((error) => {
                        console.error('Error deleting image:', error)
                        this.deleting = false
                    })
            },
        }">
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
            <form class="mx-8" method="post" enctype="multipart/form-data">
                @csrf
                <input type="submit" value="submit" x-ref="submit" hidden>

                <div class="pb-12">
                    <div class="my-6 border-b border-b-gray-300 pb-4 flex justify-between">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">
                                Vakance
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">
                                Veic vakaņču datu apskati vai maiņu šeit.

                            </p>
                        </div>
                        <label class="flex items-center text-base font-base leading-6 text-gray-900 ">
                                <input type="checkbox" name="visible" @checked($vacancy->visible ?? true)  class="rounded  focus:ring-accent1 mr-2"> Redzams?
                        </label>
                    </div>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                Nosaukums
                            </label>
                            <div class="mt-4">
                                <input required type="text" name="title" id="title" placeholder="Vecakais UML diagrammu specalists" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->title : ""}}" />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="company" class="block text-sm font-medium leading-6 text-gray-900">
                                Uzņēmums
                            </label>
                            <div class="mt-4">
                                <input required type="text" name="company" id="company" placeholder="SIA Kaka" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->company : ""}}" />
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="desc" class="block text-sm font-medium leading-6 text-gray-900">
                                Apraksts
                            </label>
                            <div class="mt-2">
                                <textarea type="text" name="desc" id="desc" placeholder="Ievadi mazu aprakstu" required class="block h-40 w-full rounded-md border-0 bg-white py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6">{{$vacancy ? $vacancy->desc : ""}}</textarea>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                Teksts
                            </label>
                            <x-text-editor class="mt-4 sm:col-span-6">
                                @if ($vacancy)
                                {!! $vacancy->content !!}
                                @else
                                <h1>Tava ģeniālā darba iespēja</h1>
                                <p>Apraksti savu karjeras iespēju</p>
                                @endif
                            </x-text-editor>

                        </div>





                        <div class="sm:col-span-3">
                            <label for="website" class="block text-sm font-medium leading-6 text-gray-900">
                                Mājaslapa
                            </label>
                            <div class="mt-2">
                                <input required type="text" name="website" id="website" placeholder="https://kaka.lv/" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->website : ""}}" />
                            </div>
                        </div>


                        <!-- image -->
                        <div class="sm:col-span-3">
                            <label
                                for="image"

                                class="block text-sm font-medium leading-6 text-gray-900"
                            >
                                Logo
                                @if ($vacancy)
                                    @if ($vacancy->file()->exists())
                                        <a
                                                class="fa-solid fa-link cursor-pointer text-accent1 transition-all hover:scale-105"
                                                href="{{ Storage::url($vacancy->file()->get()[0]->file_path) }}"
                                                target="_blank"
                                            ></a>
                                            <button
                                        @click.prevent="deleteImage()"
                                        class="fa-solid fa-trash cursor-pointer text-red-500 hover:text-red-700"
                                    ></button>
                                    @endif
                                @endif
                            </label>
                            <div
                                class="mt-2 flex min-h-[36px] w-full items-center rounded-md border-0 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6"
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

                        <div class="sm:col-span-2">
                            <label for="website" class="block text-sm font-medium leading-6 text-gray-900">
                                Pilseta
                            </label>
                            <div class="mt-2">
                                <input required type="text" name="city" id="city" placeholder="Liepāja" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->city : ""}}" />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="workload" class="block text-sm font-medium leading-6 text-gray-900">
                                Slodze
                            </label>
                            <div class="mt-2">
                                <select required id="workload" name="workload" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->workload : ""}}">
                                    <option value="Pilna" @if(isset($vacancy) && $vacancy->workload == 'Pilna') selected @endif>Pilna</option>
                                    <option value="Nepilna" @if(isset($vacancy) && $vacancy->workload == 'Nepilna') selected @endif>Nepilna</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="sm:col-span-2">
                            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">
                                Alga €
                            </label>
                            <div class="mt-2">
                                <input required id="salary" name="salary" type="number" min="0" placeholder="600" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->salary : ""}}" />
                            </div>
                        </div> -->

                        @php
                            $isRange = "false";
                            if ($vacancy) {
                                $isRange = $vacancy->salary_min == $vacancy->salary_max ? "false" : "true";
                            }

                        @endphp
                        <div x-data="{ isRange: {{$isRange}} }" class="sm:col-span-2">
                            <div class="flex justify-between">
                            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">
                            Alga €
                        </label>
                            <label class="flex items-center text-sm font-medium leading-6 text-gray-900 ">
                                <input type="checkbox" x-model="isRange" class="rounded  focus:ring-accent1 mr-2"> Diapazons?
                            </label>
                            </div>

                        <div class="mt-2">

                            <!-- Single salary input -->
                            <input x-show="!isRange" :disabled="isRange" required id="salary" name="salary" type="number" min="0" placeholder="600"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6"
                                value="{{$vacancy ? $vacancy->salary_min : ''}}">

                            <!-- Range salary inputs -->
                            <div x-show="isRange" class="flex  items-center">
                                <input required :disabled="!isRange" id="salary_min" name="salary_min" type="number" min="0" placeholder="2000"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6"
                                    value="{{$vacancy ? $vacancy->salary_min : ''}}">
                                <span class="mx-1">:</span>
                                <input required :disabled="!isRange" id="salary_max" name="salary_max" type="number" min="0" placeholder="2500"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6"
                                    value="{{$vacancy ? $vacancy->salary_max : ''}}">
                            </div>
                        </div>
                    </div>


                        <div class="sm:col-span-2">
                            <label for="deadline" class="block text-sm font-medium leading-6 text-gray-900">
                                Pieteikšanās termiņš
                            </label>
                            <div class="mt-2 flex items-center h-[36px] ">
                                <input required name="deadline" type="date" class="w-full bg-white rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6" value="{{$vacancy ? $vacancy->deadline : ""}}" />
                            </div>
                        </div>


                    </div>
            </form>
        </div>
    </div>
    </div>
</x-staff-layout>
