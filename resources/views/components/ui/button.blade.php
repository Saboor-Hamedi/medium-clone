{{-- resources/views/components/ui/button.blade.php --}}
@props([
    'type' => 'button', // button, submit, reset
    'style' => 'primary', // primary, secondary, danger, etc.
    'href' => null, // If set, renders <a>
    'icon' => null, // If set, renders <a>
])

@php
    $base = 'px-2 py-[8px] text-[10px] font-medium text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-[1.02] focus:outline-none focus:ring-none focus:ring-opacity-70 cursor-pointer transition-all duration-200 ease-in-out hover:brightness-110 active:scale-95 border border-opacity-20';

$styles = [
    'primary' => 'bg-gradient-to-r from-blue-600 to-blue-700 border-blue-500 focus:ring-blue-400',
    'secondary' => 'bg-gradient-to-r from-gray-200 to-gray-300 border-gray-300 text-gray-900 focus:ring-gray-400 hover:from-gray-300 hover:to-gray-400',
    'danger' => 'bg-gradient-to-r from-red-600 to-red-700 border-red-500 focus:ring-red-400',
    'success' => 'bg-gradient-to-r from-green-600 to-green-700 border-green-500 focus:ring-green-400',
    'dark' => 'bg-gradient-to-r from-gray-900 to-gray-800 border-gray-700 focus:ring-gray-400 text-xs',
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
