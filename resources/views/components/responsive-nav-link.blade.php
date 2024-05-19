@props([
    "active",
    "class" => "",
])

@php
    $classes =
        $active ?? false
            ? "block w-full border-l-4 border-accent1 py-2 pe-4 ps-3 text-start text-base font-medium text-accent1 transition duration-150 ease-in-out focus:border-accent1 focus:bg-light1 focus:dark1 focus:outline-none"
            : "block w-full border-l-4 border-transparent py-2 pe-4 ps-3 text-start text-base font-medium text-light1 transition duration-150 ease-in-out hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:border-gray-300 focus:bg-gray-50 focus:text-gray-800 focus:outline-none";
    $classes = $classes . " " . $class;
    @endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    {{ $slot }}
</a>
