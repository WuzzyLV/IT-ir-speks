<button
    {{ $attributes->merge(["type" => "submit", "class" => "inline-flex items-center px-4 py-2 bg-white rounded-md font-semibold text-xs text-accent1 uppercase tracking-widest hover:bg-dark1 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-accent1 focus:ring-offset-2 transition ease-in-out duration-150 btn btn-sm border-accent1 bg-transparent text-accent1 hover:bg-dark1"]) }}
>
    {{ $slot }}
</button>
