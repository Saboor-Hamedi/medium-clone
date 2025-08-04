{{-- resources/views/components/ui/button.blade.php --}}
@props([
    'type' => 'button', // button, submit, reset
    'style' => 'primary', // primary, secondary, danger, etc.
    'href' => null, // If set, renders <a>
    'icon' => null, // If set, renders <a>
])

@php
    $base =
        'px-2 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg  focus:ring-1 focus:outline-none focus:ring-blue-100 cursor-pointer transition duration-400 ease-in-out';
    $styles = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        'secondary' => 'bg-gray-200 text-gray-900 hover:bg-gray-300 focus:ring-gray-400',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
        'dark' => 'bg-gray-900 text-white hover:bg-gray-700 focus:ring-gray-500 text-xs',
    ];
    $class = $base . ' ' . ($styles[$style] ?? $styles['primary']);
@endphp

@if ($href)
    <a {{ $attributes->merge(['href' => $href, 'class' => $class]) }}>
        @if ($icon)
            <span class="{{ $icon }}"></span>
        @endif
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => $type, 'class' => $class]) }}>
     @if ($icon)
            <span class="{{ $icon }}"></span>
        @endif
        {{ $slot }}
    </button>
@endif
