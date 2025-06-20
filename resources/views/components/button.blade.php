@props([
    'type' => 'button',
    'color' => 'primary', // opções: primary, secondary, danger, success, warning
    'size' => 'md',       // opções: sm, md, lg
    'icon' => '',         // classe do ícone (ex: "fas fa-save")
])

@php
    $base = 'inline-flex items-center font-semibold rounded-lg shadow-sm transition-all duration-200';
    $sizes = [
        'sm' => 'px-3 py-1 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-5 py-3 text-lg',
    ];
    $colors = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
        'secondary' => 'bg-gray-600 text-white hover:bg-gray-700',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        'success' => 'bg-green-600 text-white hover:bg-green-700',
        'warning' => 'bg-yellow-500 text-black hover:bg-yellow-600',
    ];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$base {$sizes[$size]} {$colors[$color]}"]) }}>
    @if ($icon)
        <i class="{{ $icon }} mr-2"></i>
    @endif
    {{ $slot }}
</button>
