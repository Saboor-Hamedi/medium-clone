@props(['disabled' => false, 'name' => null, 'id' => null, 'placeholder' => null])
{{-- resources/views/components/ui/textarea.blade.php --}}
@php
    $error = $errors->has($name) ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : '';
@endphp
<textarea name="{{ $name }}" id="{{ $id ?? $name }}" placeholder="{{ $placeholder }}"
    @disabled($disabled)
    {{ $attributes->merge([
        'class' =>
            'mt-1 block w-full rounded-md border bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-y min-h-[120px]',
    ]) }}>{{ old($name, $slot) }}</textarea>
@error($name)
    <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
@enderror
