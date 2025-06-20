@props([
    'id' => 'datetime',
    'label' => 'Data e Horário',
    'value' => '',
    'name' => 'datetime',
    'required' => false,
    'disabled' => false,
])

<div class="form-group mb-3">
    <label for="{{ $id }}" class="form-label font-semibold">{{ $label }}</label>
    <input 
        type="datetime-local" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}" 
        @if($required) required @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'form-control']) }}
    >
</div>
