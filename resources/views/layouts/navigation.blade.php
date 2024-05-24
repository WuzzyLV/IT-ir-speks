@props(["isAbsolute" => false, "isAdmin" => false])
<nav
    x-data="{ open: false }"
    class="border-b border-gray-100 bg-dark1 shadow-md"
>
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between sm:mx-6">
            <!-- Navigation Links -->
            <div
                class="hidden space-x-8 justify-self-start transition-all sm:-my-px sm:flex"
            >
                {{-- LOGO --}}
                <div class="flex shrink-0 items-center" id="logo-accent">
                    @if ($isAdmin == "true")
                        <label
                            for="my-drawer-2"
                            class="drawer-button !cursor-pointer"
                        >
                            <x-application-logo class="hidden lg:block" />
                            <x-application-logo
                                class="block lg:hidden"
                                pointer="true"
                            />
                        </label>
                        <!-- <label
                            for="my-drawer-2"
                            class="btn btn-primary drawer-button lg:hidden"
                            > -->
                    @else
                        <a href="{{ route("landing") }}">
                            <x-application-logo class="rotate-0" />
                        </a>
                    @endif
                </div>

                <x-nav-link
                    :href="route('vacancies')"
                    :active="request()->routeIs('vacancies')"
                >
                    {{ __("Vakances") }}
                </x-nav-link>
                <x-nav-link
                    :href="route('news')"
                    :active="request()->routeIs('news')"
                >
                    {{ __("Aktualitates") }}
                </x-nav-link>
            </div>
            @if (! is_null(Auth::user()))
                <!-- Settings Dropdown -->
                <div class="hidden sm:ms-6 sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="bg-b inline-flex items-center rounded-md border border-transparent px-1 py-2 text-sm font-medium leading-4 text-light1 transition duration-150 ease-in-out hover:bg-accent1 hover:text-dark1 focus:outline-none"
                            >
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    {{-- prettier-ignore --}}
                                    <svg
                                        class="h-4 w-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __("Adminu panelis") }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __("Profils") }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route("logout") }}">
                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    class="!text-red-400"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                >
                                    {{ __("Izlogoties") }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:ms-6 sm:flex sm:items-center">
                    <div
                        class="flex shrink-0 items-center text-light1"
                        id="logo-accent"
                    >
                        <a href="{{ route("login") }}">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </a>
                    </div>
                </div>
            @endif

            <div class="flex shrink-0 items-center sm:hidden" id="logo-accent">
                @if ($isAdmin == "true")
                    <label
                        for="my-drawer-2"
                        class="drawer-button !cursor-pointer"
                    >
                        <x-application-logo class="" pointer="true" />
                    </label>
                @else
                    <a href="{{ route("landing") }}">
                        <x-application-logo class="rotate-0" />
                    </a>
                @endif
            </div>
            <!-- Hamburger -->
            <div class="-me-2 flex items-center justify-self-end sm:hidden">
                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out  hover:text-gray-500 active:bg-accent1 "
                >
                    <i class="fas fa-bars text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="space-y-1 border-t border-light1 pb-3 pt-2">
            <x-responsive-nav-link
                :href="route('vacancies')"
                :active="request()->routeIs('vacancies')"
            >
                {{ __("Vakances") }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                :href="route('news')"
                :active="request()->routeIs('news')"
            >
                {{ __("Aktualitātes") }}
            </x-responsive-nav-link>

            @if (is_null(Auth::user()))
                <x-responsive-nav-link
                    :href="route('login')"
                    :active="request()->routeIs('login')"
                >
                    {{ __("Ielogoties") }}
                </x-responsive-nav-link>
            @endif
        </div>

        @if (! is_null(Auth::user()))
            <!-- Responsive Settings Options -->
            <div
                class="self-end border-t border-light1 pb-1 pt-4 text-light1 shadow-lg shadow-light1"
            >
                <div class="px-4">
                    <div class="text-base font-medium">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="text-sm font-medium text-gray-400">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')">
                        {{ __("Adminu panelis") }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __("Profils") }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route("logout") }}">
                        @csrf

                        <x-responsive-nav-link
                            :href="route('logout')"
                            class="!text-red-400"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        >
                            {{ __("Izlogoties") }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endif
    </div>
</nav>
