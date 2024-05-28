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
                <main
                    class="{{ $class }} drawer-content h-full flex-grow border-l border-gray-300 bg-light1"
                >
                    <!-- Page content here -->
                    {{ $slot }}
                </main>
                <div
                    class="drawer-side top-0 h-screen lg:h-auto lg:flex-grow lg:bg-light1"
                >
                    <label
                        for="my-drawer-2"
                        aria-label="close sidebar"
                        class="drawer-overlay"
                    ></label>
                    <ul
                        class="menu h-screen w-72 flex-1 rounded-br bg-light1 p-4 text-gray-900 lg:h-auto lg:flex-grow"
                    >
                        <li class="border-b border-gray-300">
                            <a href="{{ route("dashboard") }}">Sākums</a>
                        </li>
                        <!-- Sidebar content here -->
                        <li class="border-b border-gray-300">
                            <a href="{{ route("applications") }}">
                                Pieteikumi
                            </a>
                        </li>
                        <li><a href="{{ route("users") }}">Lietotāji</a></li>
                        <li>
                            <a href="{{ route("admin-vacancies") }}">
                                Vakances
                            </a>
                        </li>
                        <li>
                            <a href="{{ route("admin-news") }}">
                                Aktualitātes
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
