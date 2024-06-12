@props(["class" => "", "nav" => true, "landing" => false])

<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
@include("components.head")

<body class="font-sans antialiased">
    <div class="flex h-screen flex-col bg-light1">
        @include("layouts.navigation", ["isAdmin" => true])

        <!-- Impliment left nav -->
        <div class="drawer flex-grow lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <main class="{{ $class }} drawer-content h-full flex-grow border-l border-gray-300 bg-light1">
                <!-- Page content here -->
                {{ $slot }}
            </main>
            <div class="drawer-side top-0 h-screen lg:h-auto lg:flex-grow lg:bg-light1">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu h-screen w-72 flex-1 rounded-br bg-light1 p-4 text-gray-900 lg:h-auto lg:flex-grow">

                    <!-- Sidebar content here -->
                    <li class="border-b border-gray-300">

                        <a href="{{ route("dashboard") }}" class="m-2"> <i class="fa-solid fa-house text-lg text-gray-900 m-1 pb-1 w-5"></i>
                            <p class="text-lg text-gray-900"> Sākums</p>
                        </a>
                    </li>

                    <li class="border-b border-gray-300">
                        <a href="{{ route("applications") }}" class="m-2">
                            <i class="fas fa-envelope text-lg text-gray-900 my-2 mx-1 w-5"></i>
                            <p class="text-lg text-gray-900"> Pieteikumi</p>
                        </a>
                    </li>

                    @if (Auth::user()->role->name == "root" || Auth::user()->role->name == "admin")
                    <li>
                        <a href="{{ route("users") }}" class="m-2"><i class="fa-solid fa-user text-lg my-2 mx-1  w-5 text-gray-900"></i>
                            <p class="text-lg text-gray-900"> Lietotāji</p>
                        </a>
                    </li>
                    @endif

                    <li>
                        <a href="{{ route("admin-vacancies") }}" class="m-2">
                            <i class="fas fa-briefcase text-lg my-2 mx-1 w-5 text-gray-900"></i>
                            <p class="text-lg text-gray-900"> Vakances</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("admin-news") }}" class="m-2">
                            <i class="fa-solid fa-newspaper text-lg my-2 mx-1 w-5 text-gray-900"></i>
                            <p class="text-lg text-gray-900"> Aktualitātes</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
