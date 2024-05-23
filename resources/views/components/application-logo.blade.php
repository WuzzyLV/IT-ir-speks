@props([
    "class" => "",
    "pointer" => false,
])

<h1
    class="raleway {{ $class }} flex items-center justify-center gap-2 rounded-xl px-2 py-1 text-3xl font-semibold text-accent1"
>
    @if ($pointer == "true")
        <span class="fa-solid fa-hand-point-right"></span>
    @else
        <span class="fas fa-hand-fist"></span>
    @endif
</h1>
