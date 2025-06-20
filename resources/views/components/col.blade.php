@props([
    'size' => '12',
])

<div class="col-md-{{ $size }}">
    {{ $slot }}
</div>
