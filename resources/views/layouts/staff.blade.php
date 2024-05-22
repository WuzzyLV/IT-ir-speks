@props(["class" => "", "nav" => true, "landing" => false])

<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

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
                <div class="drawer-side top-0 h-screen lg:h-auto lg:flex-grow">
                    <label
                        for="my-drawer-2"
                        aria-label="close sidebar"
                        class="drawer-overlay"
                    ></label>
                    <ul
                        class="menu h-screen w-72 flex-1 rounded-br bg-light1 p-4 text-gray-900 lg:h-auto lg:flex-grow"
                    >
                        <!-- Sidebar content here -->
                        <li><a href="{{ route("dashboard") }}">Dashy</a></li>
                        <li><a href="{{ route("users") }}">Lietotāji</a></li>
                        <li><a href="{{ route("admin-vacancies") }}">Vakances</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
