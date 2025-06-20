@props([
    'id' => '',
    'label' => '',
    'disabled' => false,
    'type' => 'text',
    'name' => '',
    'value' => '',
])

<div class="form-group mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input
        id="{{ $id }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'form-control']) }}
    >
</div>
