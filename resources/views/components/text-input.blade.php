@props(["disabled" => false])

<input
    {{ $disabled ? "disabled" : "" }}
    {!! $attributes->merge(["class" => "border-gray-300 focus:border-accent1 focus:ring-accent1 rounded-md shadow-sm"]) !!}
/>
