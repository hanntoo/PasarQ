@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 text-sm font-medium leading-5 text-gray-900'
            : 'inline-flex items-center px-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>