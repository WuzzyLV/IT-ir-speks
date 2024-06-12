@props(["class" => "", "nav" => true, "landing" => false, "footer" => true])

<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    @include("components.head")

    <body class="font-sans antialiased">
        {{-- {{var_dump($nav)}} --}}
        <div class="min-h-screen flex flex-col items-center justify-between min-w-screen bg-light1">
            <div class="w-full">

            @if ($nav == "true")
                @if ($landing == "true")
                    @include("layouts.landing-navigation")
                @else
                    @include("layouts.navigation")
                @endif
            @endif
            </div>


            @if (isset($header))
                <header class="\ shadow">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="w-full {{ $class }}">
                {{ $slot }}
            </main>

            @if ($footer == "true")
                @include("components.footer", ["class" => "text-gray-600"])
            @endif
        </div>
    </body>
</html>
