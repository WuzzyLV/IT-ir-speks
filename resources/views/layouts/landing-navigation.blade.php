<nav x-data="{ open: false }" class="absolute top-0 z-50 w-full">
    <!-- Primary Navigation Menu -->
    <div class="font mt-8 px-6 sm:px-7 lg:px-10">
        <div class="flex h-16 justify-end sm:mx-6">
            <!-- Logo -->
            {{-- <div class="flex shrink-0 items-center" id="logo-accent"> --}}
            {{-- <a href="{{ route("landing") }}"> --}}
            {{-- <x-application-logo/> --}}
            {{-- </a> --}}
            {{-- </div> --}}
            <!-- Navigation Links -->
            <div class="hidden space-x-8 justify-self-start transition-all sm:-my-px sm:flex">
                <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                    {{ __("Par mums") }}
                </x-nav-link>

                <x-nav-link :href="route('vacancies')" :active="request()->routeIs('vacancies')">
                    {{ __("Vakances") }}
                </x-nav-link>
                <x-nav-link :href="route('news')" :active="request()->routeIs('news')">
                    {{ __("Aktualitātes") }}
                </x-nav-link>
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    <i class="fa-solid fa-right-to-bracket"></i>

                </x-nav-link>

            </div>
            {{-- @if (!is_null(Auth::user())) --}}
            {{-- <!-- Settings Dropdown --> --}}
            {{-- <div class="hidden sm:ms-6 sm:flex sm:items-center"> --}}
            {{-- <x-dropdown align="right" width="48"> --}}
            {{-- <x-slot name="trigger"> --}}
            {{-- <button --}}
            {{-- class="inline-flex items-center rounded-md border border-transparent bg-b px-1 py-2 text-sm font-medium leading-4 text-light1  transition duration-150 ease-in-out hover:text-dark1 hover:bg-accent1 focus:outline-none" --}}
            {{-- > --}}
            {{-- <div>{{ Auth::user()->name }}
        </div> --}}

        {{-- <div class="ms-1"> --}}
        {{-- --}}
        {{-- prettier-ignore --}}
        {{-- <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /> </svg> --}}
        {{-- </div> --}}
        {{-- </button> --}}
        {{-- </x-slot> --}}

        {{-- <x-slot name="content"> --}}
        {{-- <x-dropdown-link :href="route('profile.edit')"> --}}
        {{-- {{ __("Profile") }} --}}
        {{-- </x-dropdown-link> --}}

        {{-- <!-- Authentication --> --}}
        {{-- <form method="POST" action="{{ route("logout") }}"> --}}
        {{-- @csrf --}}

        {{-- <x-dropdown-link --}}
        {{-- :href="route('logout')" --}}
        {{-- onclick="event.preventDefault(); --}}
        {{-- this.closest('form').submit();" --}}
        {{-- > --}}
        {{-- {{ __("Log Out") }} --}}
        {{-- </x-dropdown-link> --}}
        {{-- </form> --}}
        {{-- </x-slot> --}}
        {{-- </x-dropdown> --}}
        {{-- </div> --}}
        {{-- @else --}}
        {{-- <div class="hidden sm:ms-6 sm:flex sm:items-center"> --}}
        {{-- <div class="flex shrink-0 items-center text-light1  " id="logo-accent"> --}}
        {{-- <a href="{{ route("login") }}"> --}}
        {{-- <i class="fa-solid fa-right-to-bracket"></i> --}}
        {{-- </a> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- @endif --}}

        <!-- Hamburger -->
        <div class="-me-2 flex items-center justify-self-end sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out  hover:text-gray-500 active:bg-accent1">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>
    </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="flex flex-col items-center border-y border-light1 bg-dark1 pb-3 pt-2">
            <x-responsive-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')" class="!w-auto">
                {{ __("Par mums") }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('vacancies')" :active="request()->routeIs('vacancies')" class="!w-auto">
                {{ __("Vakances") }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('news')" :active="request()->routeIs('news')" class="!w-auto">
                {{ __("Aktualitātes") }}
            </x-responsive-nav-link>

            @if(is_null(Auth::user()))
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" class="!w-auto">
                {{ __("Ielogoties") }}
            </x-responsive-nav-link>
            @else
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" class="!w-auto">
                {{ __("Adminu panelis") }}
            </x-responsive-nav-link>
            @endif
        </div>
    </div>
</nav>
