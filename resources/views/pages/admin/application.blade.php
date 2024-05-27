<x-staff-layout class="flex w-full flex-col text-gray-900">
    <div class="mx-12">
        <div
            class="flex items-center justify-between border-b border-gray-300 py-4"
        >
            <div>
                <h3 class="text-base font-semibold leading-7 text-gray-900">
                    Pieteikuma informācija
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">
                    Personīgie dati un pielikumi.
                </p>
            </div>

            <a
                href="{{ route("applications") }}"
                class="btn btn-sm border-red-500 bg-transparent text-red-500"
            >
                Atpakaļ
            </a>
        </div>
        <div class="mt-4 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        Vārds uzvārds
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        Peteriks Volteris
                    </dd>
                </div>
                <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        Pietekums vakancei
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        Vecakais UML diagrammu specalists
                    </dd>
                </div>
                <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        E-pasts
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        ppSlayer123@inbox.lv
                    </dd>
                </div>
                <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt
                        class="align-middle text-sm font-medium leading-6 text-gray-900"
                    >
                        Curriculum Vitae
                    </dt>
                    <dd
                        class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                        <ul
                            role="list"
                            class="divide-y divide-gray-100 rounded-md border border-gray-200"
                        >
                            <li
                                class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6"
                            >
                                <div class="flex w-0 flex-1 items-center">
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">
                                            Labakais_CV.pdf
                                        </span>
                                        <span
                                            class="hidden flex-shrink-0 text-gray-400 xs:block"
                                        >
                                            582.2mb
                                        </span>
                                    </div>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a
                                        href="#"
                                        class="font-medium text-accent1 hover:text-dark1"
                                    >
                                        <i
                                            class="fa-solid fa-download mr-2"
                                        ></i>
                                        Lejupieladēt
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-staff-layout>
