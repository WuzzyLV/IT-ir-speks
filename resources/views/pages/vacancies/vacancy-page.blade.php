<x-app-layout class="">
    <div
        class="relative isolate overflow-hidden bg-light1 px-6 py-8 sm:py-24 lg:overflow-visible lg:px-0"
    >
        <!-- errors -->
        @if ($errors->any())
            <x-alert type="error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                    <br />
                @endforeach
            </x-alert>
        @endif

        @if (session("success"))
            <x-alert type="success">
                {{ session("success") }}
            </x-alert>
        @endif

        <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-4 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-6"
        >
            <div
                class="mt-4 lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8"
            >
                <div class="">
                    <x-breadcrumbs
                        currentRoute="Vecakais UML diagrammu specalists"
                    />
                    <div class="lg:max-w-lg">
                        <p
                            class="text-base font-semibold leading-7 text-accent1"
                        >
                            Līdz
                            {{ BladeUtils::formatDate($vacancy->deadline) }}
                        </p>
                        <h1
                            class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                        >
                            {{ $vacancy->title }}
                        </h1>
                        <p class="mt-4 text-xl leading-8 text-gray-700">
                            {{ $vacancy->desc }}
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="lg:sticky lg:top-4 lg:col-start-2 lg:row-span-4 lg:row-start-1 lg:overflow-hidden"
            >
                <div id="preview" class="px-12 py-4">
                    <div
                        class="relative flex flex-col items-center gap-x-4 px-4 sm:px-0"
                    >
                        <img
                            @if ($vacancy->file()->exists())
                                src="{{ asset("storage/" . $vacancy->file->file_path) }}"
                            @else
                                src="https://logos-world.net/wp-content/uploads/2020/06/Accenture-Emblem.png"
                            @endif
                            class="h-10 w-10 rounded-full border border-gray-400 bg-gray-50 object-contain"
                        />
                        <div class="leading-6">
                            <p class="text-gray-900">
                                <a href="#" class="">
                                    {{ $vacancy->company }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="mt-6 border-t border-gray-100">
                        <dl class="divide-y divide-gray-100 text-center">
                            <div
                                class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0"
                            >
                                <dt
                                    class="text-sm font-medium leading-6 text-gray-900"
                                >
                                    Slodze
                                </dt>
                                <dd
                                    class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0"
                                >
                                    {{ $vacancy->workload }}
                                </dd>
                            </div>
                            <div
                                class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0"
                            >
                                <dt
                                    class="text-sm font-medium leading-6 text-gray-900"
                                >
                                    Alga
                                </dt>
                                <dd
                                    class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0"
                                >
                                    {{ $vacancy->salary }} €
                                </dd>
                            </div>
                            <div
                                class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0"
                            >
                                <dt
                                    class="text-sm font-medium leading-6 text-gray-900"
                                >
                                    Atrašanās vieta
                                </dt>
                                <dd
                                    class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0"
                                >
                                    {{ $vacancy->city }}
                                </dd>
                            </div>
                            <div
                                class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0"
                            >
                                <dt
                                    class="text-sm font-medium leading-6 text-gray-900"
                                >
                                    Mājaslapa
                                </dt>
                                <dd
                                    class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0"
                                >
                                    <a
                                        href="{{ $vacancy->website }}"
                                        class="text-accent1 hover:underline"
                                    >
                                        {{ $vacancy->website }}
                                    </a>
                                </dd>
                            </div>
                            <div
                                class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0"
                            >
                                <dt
                                    class="text-sm font-medium leading-6 text-gray-900"
                                >
                                    Pieteikšanās termiņš
                                </dt>
                                <dd
                                    class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0"
                                >
                                    Līdz
                                    {{ BladeUtils::formatDate($vacancy->deadline) }}
                                </dd>
                            </div>
                            <div class="flex justify-center px-4 py-6 sm:px-0">
                                <button
                                    id="apply"
                                    class="btn btn-wide bg-light1 text-accent1 hover:bg-dark1"
                                >
                                    Pieteikties
                                </button>
                            </div>

                            {{-- --------------------------- --}}

                            {{-- --------------------------- --}}
                        </dl>
                    </div>
                </div>
                <x-apply-form vacancy-id="{{$vacancy->id}}" />
            </div>
            <div
                class="mt-4 lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8"
            >
                <div class="lg:pr-4">
                    <div
                        id="richEditor"
                        class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg"
                    >
                        {!! $vacancy->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let cancelBtn = document.getElementById('cancel');
            let applyBtn = document.getElementById('apply');
            console.log(applyBtn);

            let form = document.getElementById('apply-form');
            let preview = document.getElementById('preview');

            cancelBtn.addEventListener('click', () => {
                console.log('cancel');
                form.style.display = 'none';
                preview.style.display = 'block';
            });

            applyBtn.addEventListener('click', () => {
                console.log('apply');
                form.style.display = 'block';
                preview.style.display = 'none';
            });
        });
    </script>
</x-app-layout>
