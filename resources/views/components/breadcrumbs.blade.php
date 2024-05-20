

<div class="breadcrumbs text-sm">
    <ul>
        <li>
            <a href="{{ route("landing") }}">Sākumlapa</a>
        </li>
        <li>
            <a href="{{ route("news") }}">Aktualitātes</a>
        </li>
        <li class="line-clamp-1 text-gray-500">

            @php
                $routeCollection = Illuminate\Support\Facades\Route::getRoutes();

                foreach ($routeCollection as $route){
                    echo $route->getPath();
                }
            @endphp
            
        </li>
    </ul>
</div>