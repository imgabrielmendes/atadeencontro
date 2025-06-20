@props([
    'id' => '',
    'label' => '',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'disabled' => false,
])

<div class="form-group mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <textarea
        id="{{ $id }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'form-control', 'rows' => 4]) }}
    >{{ old($name, $value) }}</textarea>
</div>
