<div>
@props([
    'size' => 'sm', // sm | md | lg | xl
])

@php
    $sizes = [
        'sm' => 'h-12 sm:h-14',
        'md' => 'h-20 sm:h-24',
        'lg' => 'h-28 sm:h-32 md:h-36',
        'xl' => 'h-36 sm:h-40 md:h-44',
    ];

    $heightClass = $sizes[$size] ?? $sizes['md'];
@endphp

<img
    src="{{ asset('images/pricepro-logo.png') }}"
    alt="PRICEPRO"
    {{ $attributes->merge([
        'class' => "$heightClass w-auto select-none"
    ]) }}
/>

</div>

