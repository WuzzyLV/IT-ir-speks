@props([
    "active",
])

@php
    $classes =
        $active ?? false
            ? "inline-flex items-center border-b-4 border-accent1 px-1 pt-1 text-sm font-bold leading-5 text-accent1 text-semi transition duration-150 ease-in-out focus:border-light1 focus:outline-none"
            : "inline-flex items-center border-b-4 border-transparent px-1 pt-1 text-sm font-bold leading-5" .
            " text-light1 transition duration-150 ease-in-out hover:border-light1 hover:light1 focus:border-light1 focus:text-light1 focus:outline-none";
    $classes = $classes . " text-lg cursor-pointer";
    @endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    {{ $slot }}
</a>
