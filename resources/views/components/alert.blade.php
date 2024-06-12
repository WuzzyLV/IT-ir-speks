@props(['type' => 'error'])
@php
    $icon;
    $class;
    switch ($type) {
        case 'error':
            $icon = 'fa-solid fa-triangle-exclamation';
            $class = 'alert-danger border-red-400 bg-red-100 text-red-700';
            break;
        case 'success':
            $icon = 'fa-solid fa-circle-check';
            $class = 'alert-success border-green-400 bg-green-100 text-green-700';
            break;

    }
@endphp

<div x-data="{ show: true }" x-show="show" x-transition>
    <div
        class="alert relative flex justify-between rounded border px-4 !py-1 text-center opacity-100 transition duration-1000 ease-in-out {{ $class }}"
        role="alert"
    >
        <div></div>
        <div>
            <strong class="{{$icon}}"></strong>
            <span class="block sm:inline">
                {{ $slot }}
            </span>
        </div>
        <button
            type="button"
            class="rounded bg-transparent p-1.5 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-accent1 focus:ring-offset-2"
            @click="show = false"
        >
            <span class="sr-only">Aizvert paziņojumu</span>
            <i class="fa-solid fa-close text-2xl"></i>
        </button>

    </div>
</div>