@props([
    'id' => 'datetime',
    'label' => 'Data e Horário',
    'value' => '',
    'name' => 'datetime',
    'required' => false
])

<div class="form-group">
    <label for="{{ $id }}" class="form-label font-semibold">{{ $label }}</label>
    <input 
        type="datetime-local" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}" 
        {{ $required ? 'required' : '' }}
        class="form-control rounded-lg border p-2 w-full"
    >
</div>
