@props(['currentRoute' => ""])

@php
    $needsRoute = false;
    $routes = Route::current()->uri(); // vacancies/{id}
    $uriRoutes = explode("/", $routes);

    $routes = array("/" => "Sākumlapa");

    $fullUri = "/";
    foreach ($uriRoutes as $route) {
        $fullUri .= $route . "/";
        switch ($route) {
            case "vacancies":
                $routes[$fullUri] = "Vakances";
                break;
            case "news":
                $routes[$fullUri] = "Aktualitātes";
                break;
            case "{id}":
                $needsRoute = true;
                break;
        }
    }
    ;


@endphp


<div class="breadcrumbs text-sm">
    <ul>
        @foreach ($routes as $key => $value)
            @if (!$needsRoute)
                @if (end($routes) == $value)
                    <li class="line-clamp-1 text-gray-500">
                        {{ $value }}
                    </li>
                @else
                    <li>
                        <a href="{{ $key }}">{{ $value }}</a>
                    </li>
                @endif
            @else
                <li>
                    <a href="{{ $key }}">{{ $value }}</a>
                </li>
            @endif
        @endforeach

        @if ($needsRoute)
            <li class="line-clamp-1 text-gray-500">
                {{ $currentRoute }}
            </li>
        @endif
    </ul>
</div>