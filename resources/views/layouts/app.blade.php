@props(["class" => "", "nav" => true, "landing" => false, "footer" => true])

<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    @include("components.head")

    <body class="font-sans antialiased">
        {{-- {{var_dump($nav)}} --}}
        <div class="min-h-screen bg-light1">
            @if ($nav == "true")
                @if ($landing == "true")
                    @include("layouts.landing-navigation")
                @else
                    @include("layouts.navigation")
                @endif
            @endif

            @if (isset($header))
                <header class="\ shadow">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="{{ $class }}">
                {{ $slot }}
            </main>

            @if ($footer == "true")
                @include("components.footer", ["class" => "text-gray-600"])
            @endif
        </div>
    </body>
</html>
