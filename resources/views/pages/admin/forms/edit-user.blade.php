


<x-staff-layout class="flex w-full flex-col text-gray-900">
    <div x-data>
        <div class="flex items-center justify-between px-6 py-4 shadow lg:px-8">
            <h2 class="text-lg font-bold tracking-tight sm:text-xl">MegaMind123</h2>
            <div class="flex gap-1 flex-wrap justify-center" >
                <a
                    href="{{ route('users') }}"
                    class="btn btn-sm border-red-500 bg-transparent text-red-500"
                >
                    Atpakaļ
                </a>
                <button
                    href="{{ route('users') }}"
                    class="btn btn-sm border-accent1 bg-transparent text-accent1"
                    x-on:click="$refs.form.submit()"
                >
                    Saglabāt
                </button>
            </div>
        </div>
{{--        show errors--}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center" role="alert">
                <strong class="font-bold fa-solid fa-triangle-exclamation"></strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif
        <div class="flex flex-grow flex-col">
                <form class="mx-8" x-ref="form" method="post" >
                    @csrf
                    <div class="pb-12">
                        <div class="my-6 border-b border-b-gray-300 pb-4">
                            <h2
                                class="text-base font-semibold leading-7 text-gray-900"
                            >
                                Lietotājs
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">
                                Veic lietotāju datu apskati vai maiņu šeit.
                            </p>
                        </div>
                        <div
                            class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                        >
                            <div class="sm:col-span-3">
                                <label
                                    for="username"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    Lietotājvārds
                                </label>
                                <div class="mt-2">
                                    <input
                                        type="text"
                                        name="username"
                                        id="username"
                                        autocomplete="nickname"
                                        placeholder="kakins"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6"
                                        value="{{$user ? $user->name : ""}}"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label
                                    for="country"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    Pakāpe
                                </label>
                                <div class="mt-2">
                                    <select
                                        id="role"
                                        name="role"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-accent1 sm:text-sm sm:leading-6"
                                    >
                                        <option value="root" @selected($user->role->name == 'root')>Vadītājs</option>
                                        <option value="admin" @selected($user->role->name == 'admin')>Administrators</option>
                                        <option value="moderator" @selected($user->role->name == 'moderator')>Moderators</option>
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label
                                    for="email"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    E-pasta adrese
                                </label>
                                <div class="mt-2">
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        placeholder="kakins@inbox.lv"
                                        autocomplete="email"
                                        required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-within:ring-accent1 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                        value="{{$user ? $user->email : ""}}"
                                    />
                                </div>
                            </div>

                            <!-- password -->
                            <div class="sm:col-span-3">
                                <label
                                    for="password"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    Parole
                                </label>
                                <div class="mt-2">
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        autocomplete="new-password"
                                        {{--if isint new dont require pass--}}
                                        {{$new ? "required" : ""}}
                                        placeholder="Parole"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-within:ring-accent1 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-staff-layout>
